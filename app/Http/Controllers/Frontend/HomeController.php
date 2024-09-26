<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function home()
    {
        return view('frontend.home');
    }

    public function shop()
    {
        return view('frontend.shop');
    }

    public function product()
    {
        return view('frontend.detail-product');
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

