<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function addNewPost(Request $request)
    {
        // Validate and sanitize user inputs
        $validatedData = $request->validate([
            'discription' => 'nullable|string',
            'postImage' => 'nullable|image|max:2048', // Validate as an image and limit file size to 2MB
            'chips' => 'nullable|array',
        ]);

        // Check that either 'discription' or 'postImage' is provided
        if (empty($validatedData['discription']) && !$request->hasFile('postImage')) {
            return back()->with('error', 'Please provide either a description or an image.');
        }

        // Create a new Post model instance and fill it with validated data
        $post = new Post();
        $post->fill([
            'uid' => session('id'),
            'discription' => $validatedData['discription'],
            'tags' => implode(', ', $validatedData['chips'] ?? []),
            // Add other columns like 'uid', 'img1', etc., as needed
        ]);

        // Handle file upload if 'postImage' is provided
        if ($request->hasFile('postImage')) {
            $image = $request->file('postImage');
            $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $imagePath = 'posts/' . $imageName;

            // Store the uploaded image in the 'public' disk
            Storage::disk('public')->put($imagePath, file_get_contents($image));

            // Set the 'img1' column in the database to the image path
            $post->img1 = $imagePath;
        }

        // Save the post data to the database
        $post->save();

        // Set the success message in the session
        session()->flash('success', 'Post added successfully.');
        
        // Redirect the user to the home page
        return redirect('/home');
    }


}
