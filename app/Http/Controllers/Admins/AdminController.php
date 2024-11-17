<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Product\Category;
use App\Models\Product\Order;
use Illuminate\Http\Request;
use Auth;
use Hash;
use File;
use App\Models\Product\Product;
class AdminController extends Controller
{
    //
     public  function viewLogin()
     {
        return view('admin.login');
     }


     public function checkLogin(Request $request)
{
    $remember_me = $request->has('remember_me') ? true : false;

    if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {

        return redirect() -> route('admins.dashboard');
    }
    return redirect()->back()->with(['error' => 'error logging in']);
}


     public  function index()
     {
        $productsCount = Product::count();
        $ordersCount = Order::count();
        $categorysCount = Category::count();
        $adminsCount = Admin::count();
        return view('admin.index', compact('productsCount','ordersCount','categorysCount','adminsCount'));
     }
     public function logout(Request $request)
     {
         Auth::guard('admin')->logout();  // Specify the 'admin' guard if applicable

         // Invalidate the session
         $request->session()->invalidate();

         // Regenerate the session token
         $request->session()->regenerateToken();

         return redirect()->route('view.login')->with('success', 'Logged out successfully!');
     }

 public  function displayAdmins()
     {

        $allAdmins = Admin::all();
        return view('admin.alladmins', compact('allAdmins'));
     }
     public  function createAdmins()
     {
        return view('admin.createadmins');
     }
     public function storeAdmins(Request $request)
     {
         // Validate the form inputs
         $validatedData = $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:admins,email',
             'password' => 'required',
         ]);

         // Create a new admin
         $storeAdmin = Admin::create([
             'name' => $validatedData['name'],
             'email' => $validatedData['email'],
             'password' => Hash::make($validatedData['password']),
         ]);

         // Check if the admin creation was successful
         if ($storeAdmin) {
             return redirect()->route('admin.alladmins')->with('success', 'Admin created successfully');
         }

         // Optional: Handle the failure case if the admin creation was not successful
         return back()->with('error', 'Failed to create admin. Please try again.');
     }

     public  function displayCategories()
     {

        $allCategories = Category::select()->orderBy('id','desc')->get();
        return view('admin.category.allcategories', compact('allCategories'));
     }
     public  function createCategories()
     {
        return view('admin.category.createcategories');
     }


     public function   storeCategories(Request $request)
     {
        $destinationPath = 'frontend/img/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);
         // Create a new admin
         $storeCategories = Category::create([
            'icon' => $request->icon,
             'name' => $request->name,
             'image' => $myimage,

         ]);

         // Check if the admin creation was successful
         if ($storeCategories) {
             return redirect()->route('categories.all')->with('success', 'Catgeory created successfully');
         }

         // Optional: Handle the failure case if the admin creation was not successful
         return back()->with('error', 'Failed to create admin. Please try again.');
     }

        public function editCategories($id)
        {
            $category = Category::find($id);
            return view('admin.category.edit', compact('category'));
        }
        public function   updateCategories(Request $request ,$id)
        {
            $category= Category::find($id);
            $category ->update($request->all());


            // Check if the admin creation was successful
            if ($category) {
                return redirect()->route('categories.all')->with('update', 'Catgeory updated successfully');
            }

            // Optional: Handle the failure case if the admin creation was not successful

        }

        public function   deleteCategories($id)
        {
            $category= Category::find($id);
            if(File::exists(public_path('frontend/img/' .  $category->image))){
                File::delete(public_path('frontend/img/' .  $category->image));
            }else{
                //dd('File does not exists.');
            }
            $category ->delete();


            // Check if the admin creation was successful
            if ($category) {
                return redirect()->route('categories.all')->with('update', 'Catgeory deleted successfully');
            }

            // Optional: Handle the failure case if the admin creation was not successful

        }

        public  function displayProducts()
        {

           $allProducts = Product::all();
           return view('admin.products.allproducts', compact('allProducts'));
        }

        public function createProducts()
        {
            $allCategories = Category::all();
            $allProducts= Product::all();
            return view('admin.products.createproducts', compact('allCategories','allProducts'));
        }

        public function   storeProducts(Request $request)
        {
           $destinationPath = 'frontend/img/';
           $myimage = $request->image->getClientOriginalName();
           $request->image->move(public_path($destinationPath), $myimage);
            // Create a new admin
            $storeProducts = Product::create([
                 'name' => $request->name,
                 'price' => $request->price,
                 'description' => $request->description,
                 'category_id' => $request->category_id,
                 'exp_date' => $request->exp_date,
                'image' => $myimage,

            ]);

            // Check if the admin creation was successful
            if ($storeProducts) {
                return redirect()->route('products.all')->with('success', 'Product created successfully');
            }

            // Optional: Handle the failure case if the admin creation was not successful
            return back()->with('error', 'Failed to create admin. Please try again.');
        }


        public function   deleteProducts($id)
        {
            $product= Product::find($id);
            if(File::exists(public_path('frontend/img/' .   $product->image))){
                File::delete(public_path('frontend/img/' .   $product->image));
            }else{
                //dd('File does not exists.');
            }
            $product ->delete();


            // Check if the admin creation was successful
            if ( $product) {
                return redirect()->route('products.all')->with('delete', 'Product deleted successfully');
            }

            // Optional: Handle the failure case if the admin creation was not successful

        }
    }
