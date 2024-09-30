<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function home()
    {
        $categories= Category::select()->orderBy('id','desc')->get();
        return view('frontend.home',compact('categories'));
    }



    public function cart()
    {
        return view('frontend.cart');
    }
    public function checkout()
    {
        return view('frontend.checkout');
    }
    public function transaction()
    {
        return view('frontend.transaction');
    }
    public function registeration()
    {
        return view('frontend.register');
    }
    public function login()
    {
        return view('frontend.login');
    }

}

