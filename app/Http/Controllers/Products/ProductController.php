<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\Category;
use App\Models\Product\Cart;
use Auth;
use Redirect;

class ProductController extends Controller
{
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
        // Fetch the product by id
        $product = Product::findOrFail($id);

        // Fetch related products from the same category, excluding the current product
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->get();

        // Check if the product is already in the cart for the user
        $checkInCart = Cart::where('pro_id', $id)
            ->where('user_id', Auth::id()) // Ensure it's for the logged-in user
            ->count();

        // Return the view with both the product and the related products
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
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'qty' => 'required|integer|min:1',
            'image' => 'required|string|max:255', // Assuming it's a URL or path to the image
            'pro_id' => 'required|integer|exists:products,id',
        ]);

        // Create the cart entry
        $cartItem = Cart::create([
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty,
            'image' => $request->image,
            'pro_id' => $request->pro_id,
            'user_id' => Auth::id(),
        ]);

        // Redirect back to the single product page with a success message
        if ($cartItem) {
            return redirect()->route('single.product', $request->pro_id)
                ->with('success', 'Product added to cart successfully');
        }

        // Optionally, handle failure case
        return back()->withErrors('Failed to add product to cart');
    }

    // Method to display the cart
    public function cart()
    {
        // Fetch cart items for the logged-in user
        $cartProducts = Cart::where('user_id', Auth::id())->get();

        return view('frontend.products.cart', compact('cartProducts'));
    }
}
