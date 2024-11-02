<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Product\Order;
class UsersController extends Controller
{
    public function myOrders()
    {
        $orders=Order::select()->where('user_id',Auth::user()->id)->get();
        return view('frontend.users.myorders',compact('orders'));
    }
}
