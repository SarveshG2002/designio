<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\friendController;
use App\Models\Chat;


class ChatController extends Controller
{
    public function getMyChat($fid,Request $request){

        $userId = auth()->user()->id; // Get the logged-in user's ID
        $recipientUserId = $fid; // Get the recipient user's ID

        // Check if a chat already exists based on the user IDs
        $chat = Chat::where(function ($query) use ($userId, $recipientUserId) {
            $query->where('user1_id', $userId)->where('user2_id', $recipientUserId);
        })->orWhere(function ($query) use ($userId, $recipientUserId) {
            $query->where('user1_id', $recipientUserId)->where('user2_id', $userId);
        })->first();

        if ($chat) {
            // Chat already exists
            // return json_encode(['message' => 'Chat already exists']);
        } else {
            // Chat does not exist
            $newChat = new Chat();
            $newChat->user1_id = $userId;
            $newChat->user2_id = $recipientUserId;
            $newChat->save();
            // print_r()
            // return json_encode(['message' => 'sent']);
        }

        $friendController = new friendController();
        $friendData=$friendController->getMyfriendChat($fid);
        $friends=$friendController->getFriends($request);
        $friends['mydata']=$friendData[0];
        $friends['user_id']=$fid;
        return view('user.chat',$friends);
    }

    public function sendmsg(Request $request){
        
        return json_encode(['message'=>"sent"]);
    }

}
