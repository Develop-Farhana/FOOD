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
            $vegetables = Product::where('category_id', 3)->orderBy('name', 'desc')->take(5)->get();
            return view('frontend.products.single-category', [
                'products' => $products,
                'vegetables' => $vegetables,
            ]);
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
        // Ensure user is authenticated before proceeding
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        // Validate incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string',
            'town' => 'required|string',
            'state' => 'required|string',
            'zip_code' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'order_notes' => 'nullable|string',
        ]);

        // Calculate the total price (assuming $checkoutSubtotal is passed in)
        $totalPrice = $request->price + 20;

        // Create the order
        $checkout = Order::create([
            'name' => $validatedData['name'],
            'last_name' => $validatedData['last_name'],
            'address' => $validatedData['address'],
            'town' => $validatedData['town'],
            'state' => $validatedData['state'],
            'zip_code' => $validatedData['zip_code'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
            'price' => $totalPrice,
            'user_id' => Auth::user()->id,
            'order_notes' => $validatedData['order_notes'],
        ]);
        // If the order is created successfully, redirect to payment page
        if ($checkout) {
            Session::put('price', $checkout->price);
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
