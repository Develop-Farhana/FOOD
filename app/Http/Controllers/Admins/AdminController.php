<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Product\Category;
use App\Models\Product\Order;
use Illuminate\Http\Request;
use Auth;
use Hash;
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


    }
