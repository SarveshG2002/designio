<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Follower;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class friendController extends Controller
{
    public function getFriends(Request $request)
    {
        // Get the ID of the currently authenticated user
        $currentUserId = session('id');

        // Retrieve users you follow
        $following = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->join('followers', 'users.id', '=', 'followers.followed_user_id')
            ->where('followers.user_id', $currentUserId)
            ->get(['users.*', 'profiles.bio','profiles.profile']);



        $usersNotFollowed = User::select('users.*', 'profiles.bio', 'profiles.profile')
        ->leftJoin('profiles', 'users.id', '=', 'profiles.user_id')
        ->where('users.id','<>',$currentUserId)->get();

        return [
            'following' => $following,
            'notFollowing' => $usersNotFollowed,
        ];
        // echo "<pre>";
        // print_r($usersNotFollowed->toArray());
    }

    public function getMyfriendChat($fid) {
        // Assuming you have a User model and a Profile model defined
        
        // Get the user data with the given ID, including their profile
        $user = User::join('profiles', 'users.id', '=', 'profiles.user_id')
        ->where('users.id', $fid)
        ->first();
        
        if ($user) {
            // $user will contain the user data along with the related profile data
            return [$user];
        } else {
            // Handle the case where the user is not found
            return response()->json(['error' => 'User not found']);
        }
    }
    

    public function isFollowing($user_id, $other_user_id) {
        $count = Follower::where('user_id', $user_id)
            ->where('followed_user_id', $other_user_id)
            ->count();
    
        return $count > 0;
    }


    public function followFriend(Request $request, $id) {
        // Get the user's ID from the session
        // $user_id = session('id');

        // Find the authenticated user
        $user = Auth::user();
        $user_id = $user->id;
        // Find the user to follow
        $friend = User::find($id);

        if (!$user || !$friend) {
            // Handle the case where either the authenticated user or the friend is not found
            return response()->json(['error' => 'User not found']);
        }

        // Create an instance of the Follower model
        $follower = new Follower();

        // Check if the user is already following the friend with the given ID
        $isFollowing = $follower->where('user_id', $user_id)
            ->where('followed_user_id', $id)
            ->exists();

        if ($isFollowing) {
            // User is already following the friend, unfollow them
            $follower->where('user_id', $user_id)
                ->where('followed_user_id', $id)
                ->delete();

            return response()->json(['message' => 'Unfollowed successfully']);
        } else {
            // User is not following the friend, follow them
            $follower->user_id = $user->id;
            $follower->followed_user_id = $id;
            $follower->save();

            return response()->json(['message' => 'Followed successfully']);
        }
    }

    
    
    
    
    
}
