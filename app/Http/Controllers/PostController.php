<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Like;
use Illuminate\Support\Facades\Log;


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

        print_r($request->all());
        // die();

        // Create a new Post model instance and fill it with validated data
        $post = new Post();
        $post->fill([
            'uid' => session('id'),
            'description' => $validatedData['discription'],
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


    public function getPosts() {
        $userId = session('id'); // Change this to the desired user's ID
    
        $posts = Post::select('posts.*', 'profiles.username')
            ->leftJoin('followers', 'followers.followed_user_id', '=', 'posts.uid')
            ->leftJoin('profiles', 'posts.uid', '=', 'profiles.user_id')
            ->where('followers.user_id', $userId)
            ->orderBy('posts.created_at', 'desc') // Sort by the newest posts first
            ->get();
    
        return $posts;
    }


    public function likepost(Request $request, $postId) {
        try {
            // Get the authenticated user's ID
            $userId = $request->input('uid'); // You can replace this with your authentication logic
        
            // Check if the user has already liked the post
            $existingLike = Like::where('user_id', $userId)->where('post_id', $postId)->first();
    
            if ($existingLike) {
                // User has already liked the post, so delete the like
                $existingLike->delete();
                return response()->json(['message' => 'unliked']);
            } else {
                // User has not liked the post, so create a new like
                $newLike = new Like();
                $newLike->user_id = $userId;
                $newLike->post_id = $postId;
                $newLike->save();
        
                return response()->json(['message' => "liked"]);
            }
        } catch (\Exception $e) {
            // Log the error
            Log::error($e);
            return response()->json(['error' => "error occured"]);
        }
    }
 
    
    
    
    


}
