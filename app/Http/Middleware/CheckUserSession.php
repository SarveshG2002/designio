<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    function generateBearerToken() {
        // Generate a random token (you can use any method to generate a secure token)
        $token = bin2hex(random_bytes(32)); // Generates a 64-character token
    
        return $token;
    }


    public function handle(Request $request, Closure $next): Response
    {

        if (session()->has('status')) {
            // Check if the 'status' is 'profile_pending'
            if (session('status') === 'profile_pending') {
                // The user's profile is pending, redirect to the profile page
                return redirect('profile'); // Replace 'profile' with the actual name of your profile route or URL
            } elseif (session('status') === 'complete') {
                if (!$request->hasCookie('auth_token')) {
                    // Generate a new bearer token (you can use any method to generate the token)
                    $token = $this->generateBearerToken(); // Replace with your token generation logic
            
                    // Set the 'auth_token' cookie with the generated token
                    $cookie = cookie('auth_token', $token, 60*24*7); // Adjust the expiration time as needed
            
                    // Attach the cookie to the response
                    $response = $next($request)->withCookie($cookie);
            
                    return $response;
                }
                // The user's profile is complete, redirect to the home page
                return $next($request); // Replace 'home' with the actual name of your home route or URL
            }
        }
    
        // If no 'status' session or 'status' is not profile_pending or complete, show the login form
        return redirect('login');
        // return $next($request); 
        
    }
}
