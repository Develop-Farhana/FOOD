<?php
namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\Category;
use App\Models\Product\Cart;
use App\Models\Product\Order;
use Auth;
use Redirect;
use Session;

class ProductController extends Controller
{
    // Ensure user is authenticated for cart and checkout methods
    public function __construct()
    {
        $this->middleware('auth')->only(['addToCart', 'cart', 'deleteFromCart', 'prepareCheckout', 'checkout', 'processCheckout']);
    }

    // Method to show products by category
    public function singleCategory($id)
    {
        $products = Product::where('category_id', $id)
            ->orderBy('id', 'desc')
            ->get();

        return view('frontend.products.single-category', compact('products'));
    }

    // Method to show a single product and its related products
    public function singleProduct($id)
    {
        $product = Product::findOrFail($id);
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->get();

        $checkInCart = Cart::where('pro_id', $id)
            ->where('user_id', Auth::id())
            ->count();

        return view('frontend.products.singleproduct', compact('product', 'relatedProducts', 'checkInCart'));
    }

    // Shop method that lists various product categories
    public function shop()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $mostWanted = Product::orderBy('name', 'desc')->take(5)->get();
        $vegetables = Product::where('category_id', 3)->orderBy('name', 'desc')->take(5)->get();
        $meats = Product::where('category_id', 1)->orderBy('name', 'desc')->take(5)->get();
        $fishes = Product::where('category_id', 2)->orderBy('name', 'desc')->take(5)->get();
        $fruits = Product::where('category_id', 4)->orderBy('name', 'desc')->take(5)->get();

        return view('frontend.products.shop', compact('categories', 'mostWanted', 'vegetables', 'meats', 'fishes', 'fruits'));
    }

    // Add to cart method
    public function addToCart(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'qty' => 'required|integer|min:1',
            'image' => 'required|string|max:255',
            'pro_id' => 'required|integer|exists:products,id',
        ]);

        $cartItem = Cart::create([
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty,
            'image' => $request->image,
            'pro_id' => $request->pro_id,
            'user_id' => Auth::id(),
            "subtotal" => $request->qty * $request->price
        ]);

        return $cartItem
            ? redirect()->route('single.product', $request->pro_id)->with('success', 'Product added to cart successfully')
            : back()->withErrors('Failed to add product to cart');
    }

    // Method to display the cart
    public function cart()
    {
        $cartProducts = Cart::where('user_id', Auth::id())->get();
        $subtotal = Cart::where('user_id', Auth::id())->sum('subtotal');
        return view('frontend.products.cart', compact('cartProducts', 'subtotal'));
    }

    // Delete from cart
    public function deleteFromCart($id)
    {
        $deleteCart = Cart::find($id);

        if ($deleteCart) {
            $deleteCart->delete();
            return redirect()->route('products.cart')->with('delete', 'Product Deleted From Cart Successfully');
        }

        return redirect()->route('products.cart')->with('error', 'Product Not Found');
    }

    // Prepare for checkout
    public function prepareCheckout(Request $request)
    {
        Session::put('price', $request->price);
        // dd(Session::get('price'));
        $newPrice = Session::get('price');

        if ($newPrice > 0) {
            return Redirect::route('products.checkout');
        }

        return redirect()->route('products.cart')->with('error', 'Invalid price.');
    }

    // Checkout page
    public function checkout()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $checkoutSubtotal = Cart::where('user_id', Auth::id())->sum('subtotal');
        return view('frontend.products.checkout', compact('cartItems', 'checkoutSubtotal'));
    }

    // Process checkout
    public function processCheckout(Request $request)
    {
        $checkout = Order::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'town' => $request->town,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'price' => $request->price,
            'user_id' => $request->user_id,
            'order_notes' => $request->order_notes
        ]);

        if ($checkout) {
            Session::forget('price');
            return redirect()->route('products.pay');
        }

        return back()->with('error', 'Checkout failed.');
    }

    // Pay with PayPal (you can add actual PayPal integration later)
    public function payWithPaypal()
    {
        return view('frontend.products.pay');
    }

    // Success page after checkout
    public function success()
    {
        Cart::where('user_id', Auth::id())->delete();
        Session::forget('price');
        return view('frontend.products.success');
    }

    public function home()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.home',compact('categories'));

    }
}
