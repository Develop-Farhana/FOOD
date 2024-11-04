<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Product\Order;
use App\Models\User;

class UsersController extends Controller
{
    public function myOrders()
    {
        $orders=Order::select()->where('user_id',Auth::user()->id)->get();
        return view('frontend.users.myorders',compact('orders'));
    }



    public function settings()
    {

        $user=User::find(Auth::user()->id);
        return view('frontend.users.settings',compact('user'));
    }
    public function updateUserSettings(Request $request ,$id)
    {
        Request()->validate([
            "email"=>"required|max:40",
            "name"=>"required|max:40",
        ]);
        $user=User::find($id);
        $user->update($request->all());

        if ($user) {

            return Redirect()->route('users.settings')->with(['update'=>'user data updated successfully']);
        }
    }


}
