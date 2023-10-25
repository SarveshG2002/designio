<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\friendController;

class ChatController extends Controller
{
    public function getMyChat($fid,Request $request){
        $friendController = new friendController();
        $friends=$friendController->getfriends($request);
        return view('user.chat',$friends);
    }
}
