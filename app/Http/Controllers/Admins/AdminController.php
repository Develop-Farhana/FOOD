<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
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
        return view('admin.index');
     }
     public function logout(Request $request)
     {
         Auth::logout();  // Logs out the authenticated user
         return redirect()->route('view.login')->with('success', 'Logged out successfully!');
     }

}
