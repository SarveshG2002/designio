<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class ProfileController extends Controller
{
    public function edit()
    {
        // Retrieve the authenticated user's profile data
        $user = Auth::user();

        // You can pass the user data to a view for editing the profile
        return view('profile.edit', compact('user'));
    }

    // use Illuminate\Support\Facades\Validator;

    public function update(Request $request)
    {
        // 1. Validate user inputs
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|',
            // 'name' => 'required|string|max:255',
            'gender' => 'required|string|max:25',
            // Add validation rules for other profile fields
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            // print_r('hello');
        }

        // print_r($_POST);
        // die();
        $profile = new Profile();
        // 2. Check if a profile image is uploaded
        if ($request->hasFile('profile_picture')) {
            // $image = $request->file('profile_picture');
            // $imageName = time() . '.' . $image->getClientOriginalExtension();
            // $image->move(public_path('uploads/profile/profile_pictures'), $imageName);

            // // Get the path of the uploaded profile picture
            // $profilePicturePath = 'uploads/profile/profile_pictures/' . $imageName;




            $image = $request->file('profile_picture');
            $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $imagePath = 'profiles/' . $imageName;

            // Store the uploaded image in the 'public' disk
            Storage::disk('public')->put($imagePath, file_get_contents($image));

            // Set the 'img1' column in the database to the image path
            $profile->profile = $imagePath;
        } else {
            // If no image was uploaded, set the profile picture path to null or a default path
            $imagePath = null; // Set to null or specify a default path
        }

        // 3. Insert user data into the profile table
        
        $profile->user_id = Auth::id(); // Get the user ID from the session
        $profile->username = $request->input('username');
        // $profile->name = $request->input('name');
        $profile->profile = $imagePath;
        $profile->bio = $request->input('bio');
        $profile->profession = $request->input('profession');
        $profile->experience = $request->input('experience');
        $profile->skills = $request->input('skills');
        $profile->location = $request->input('location');
        $profile->presence = $request->input('presence');
        $profile->gender = $request->input('gender');
        // $profile->profile_picture = $profilePicturePath; // Set the profile picture path

        // Save the profile data
        $profile->save();

        $user = Auth::user();
        $email = $user->email;
        Session::put('id', Auth::id());
        // Session::put('profile_picture', $profilePicturePath);
        Session::put('email', $email);
        Session::put('username',$request->input('username'));
        Session::put('status','complete');
        Session::put('profileimg',$imagePath);
        Session::put('name',$user->name);
        // echo "profile saved";
        // die();
        // 4. Redirect to the home page
        return redirect('home');
    }


}
