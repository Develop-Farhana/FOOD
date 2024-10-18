<?php



namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    public function login(Request $request)
    {
        // Validation
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        // Credentials
        $credentials = $request->only('email', 'password');

        // Attempt to login
        if (Auth::attempt($credentials)) {
            // Successful login
            return redirect()->route('products.shop')->with('success', 'Login successful!');
        } else {
            // Failed login
            return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }
}
