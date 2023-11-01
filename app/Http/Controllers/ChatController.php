<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\friendController;

class ChatController extends Controller
{
    public function getMyChat($fid,Request $request){
        $friendController = new friendController();
        $friendData=$friendController->getMyfriendChat($fid);
        $friends=$friendController->getFriends($request);
        $friends['mydata']=$friendData[0];
        return view('user.chat',$friends);
    }

    public function sendmsg(){
        return json_encode(['message'=>"sent"]);
    }

}
