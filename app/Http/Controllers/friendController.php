<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\User;


class friendController extends Controller
{
    public function getfriends(Request $request){
        // $currentUserId = Auth::id(); // Get the ID of the currently authenticated user
        $users = User::where('id', '!=', session('id'))->get(); // Exclude the current user
        return $users;
    }

    public function followFriend(Request $request){
        echo "hello my friend";
    }
}
