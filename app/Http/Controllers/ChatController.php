<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getMyChat($fid){
        return view('user.chat',['fid'=>$fid]);
    }
}
