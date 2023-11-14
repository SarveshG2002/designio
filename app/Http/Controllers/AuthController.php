<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Profile;
use App\Http\Controllers\friendController;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ChatController;



class AuthController extends Controller
{

    public function showLoginForm()
    {
        // Check if the 'status' session exists
        if (session()->has('status')) {
            // Check if the 'status' is 'profile_pending'
            if (session('status') === 'profile_pending') {
                // The user's profile is pending, redirect to the profile page
                return redirect('profile'); // Replace 'profile' with the actual name of your profile route or URL
            } elseif (session('status') === 'complete') {
                // The user's profile is complete, redirect to the home page
                return redirect('home'); // Replace 'home' with the actual name of your home route or URL
            }
        }
    
        // If no 'status' session or 'status' is not profile_pending or complete, show the login form
        return view('auth.login');
    }
    
    public function showRegistrationForm()
    {
        if (session()->has('status')) {
            // Check if the 'status' is 'profile_pending'
            if (session('status') === 'profile_pending') {
                // The user's profile is pending, redirect to the profile page
                return redirect('profile'); // Replace 'profile' with the actual name of your profile route or URL
            } elseif (session('status') === 'complete') {
                // The user's profile is complete, redirect to the home page
                return redirect('home'); // Replace 'home' with the actual name of your home route or URL
            }
        }
        return view('auth.register');
        // echo "hello";
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, retrieve additional data from the profiles table
            $user = Auth::user(); // Get the authenticated user instance
            $profile = Profile::where('user_id', $user->id)->first(); // Retrieve the user's profile

            if ($profile) {
                // If a profile exists, store its data in sessions
                Session::put('id', $user->id);
                Session::put('profile_picture', $profile->profile);
                Session::put('email', $user->email);
                Session::put('username', $profile->username);
                Session::put('status', 'complete');
                Session::put('profileimg', $profile->profile);
                Session::put('name', $user->name);

                // Generate a new bearer token
                $token = $user->createToken('auth-token')->plainTextToken;
                Session::put('authentication',$token);
                // Set the 'auth_token' cookie with the generated token
                $response = redirect()->intended('/home')->cookie('auth_token', $token, 60*24*7);

                return $response;
            } else {
                // Handle the case where the user has no profile data
                // You can set default values or handle it as needed
                Session::put('status', 'profile_pending'); // Store status as "profile_pending"
                Session::put('id', $user->id);
                return redirect()->intended('/profile');
            }
        }

        // Authentication failed, redirect back with an error message.
        return back()->withErrors(['email' => 'Invalid credentials']);
    }


    public  function home(){
        // if (session()->has('status')) {
        //     // Check if the 'status' is 'profile_pending'
        //     if (session('status') === 'profile_pending') {
        //         // The user's profile is pending, redirect to the profile page
        //         return redirect('profile'); // Replace 'profile' with the actual name of your profile route or URL
        //     } elseif (session('status') === 'complete') {
        //         // The user's profile is complete, redirect to the home page
        //         return view('user.home'); // Replace 'home' with the actual name of your home route or URL
        //     }
        // }
    
        // // If no 'status' session or 'status' is not profile_pending or complete, show the login form
        // return redirect('login');
        $postController = new PostController();
        $posts=$postController->getPosts();
        // echo "<pre>";
        // print_r($posts->toArray());
        // echo "</pre>";
        return view('user.home',['posts'=>$posts]);
        
    }

    public function logout(){
        Auth::logout();

        // Clear all session data
        Session::flush();

        // Redirect to the login page or any other desired location
        return redirect()->route('login');
    }

    public function register(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // Check uniqueness in the 'users' table
            'password' => 'required|string|min:8|confirmed', // Requires a 'password_confirmation' field
        ]);

        // Create a new user record
        $user = \App\Models\User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), // Hash the password
        ]);

        // Authenticate the newly registered user
        Auth::login($user);

        // Store data in the session
        Session::put('status', 'profile_pending'); // Store status as "profile_pending"
        Session::put('id', $user->id); // Store the user's ID

        // Redirect to the user's profile or any other desired location
        return redirect('profile');
    }


    public function showProfileForm()
    {
        // Check if the 'status' session exists
        if (!session()->has('status')) {
            // Session does not exist, redirect to login
            return redirect('login');
        }

        // Check if the 'status' session is 'profile_pending'
        if (session('status') === 'profile_pending') {
            // The user's profile is pending, you can display the profile form here
            return view('user.profile'); // Replace 'profile' with the actual name of your profile view
        }else if(session('status') === 'complete'){
            return redirect('home');
        } 
        
        else {
            // The user's profile is not pending, you can handle this case as needed
            // For example, you can redirect to a different page or display a message
            return redirect('login'); // Replace 'another-page' with the desired URL
        }
    }


    public function explore(){
        $postController = new PostController();
        $posts=$postController->getExplorePosts();
        return view('user.explore',['posts'=>$posts]);
    }
    public function friends(Request $request){
        $friendController = new friendController();
        $friends=$friendController->getfriends($request);
        return view('user.friends',$friends);
    }
    public function group(){
        $chatController = new ChatController();
        $myChat=$chatController->getAllNewChat(); 
        return view('user.groups',['myChat'=>$myChat]);
    }
    public function trending(){
        return view('user.trending');
    }
    public function setting(){
        
        return view('user.setting');
    }
    



    // Add more authentication methods (registration, password reset, etc.) here.
}
