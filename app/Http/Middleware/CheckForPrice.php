<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;

class CheckForPrice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */public function handle(Request $request, Closure $next): Response
{
    // Check if the current route is 'products/checkout', 'products/pay', or 'products/success'
    if (
        $request->is('products/checkout') ||
        $request->is('products/pay') ||
        $request->is('products/success')
    ) {
        // Check if the 'price' in the session is 0 (or not set)
        if (Session::get('price', 0) == 0) {
            // Abort with a 403 Forbidden response if the condition is met
            return abort(403, 'Access denied due to invalid price.');
        }
    }

    // Continue with the request if the condition is not met
    return $next($request);
}

}
