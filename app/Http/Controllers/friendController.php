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
        $users = User::all();
        // return view('friends.index', ['users' => $users]);
        return $users;
    }
}
