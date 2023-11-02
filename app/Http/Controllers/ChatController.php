<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\friendController;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{

    public function getChatId($userId,$recipientUserId){
        $chat = Chat::where(function ($query) use ($userId, $recipientUserId) {
            $query->where('user1_id', $userId)->where('user2_id', $recipientUserId);
        })->orWhere(function ($query) use ($userId, $recipientUserId) {
            $query->where('user1_id', $recipientUserId)->where('user2_id', $userId);
        })->first();
        return  $chat;
    }

    public function getMyChat($fid,Request $request){

        $userId = auth()->user()->id; // Get the logged-in user's ID
        $recipientUserId = $fid; // Get the recipient user's ID

        // Check if a chat already exists based on the user IDs
        $chat = $this->getChatId($userId,$recipientUserId);

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

    public function sendmsg(Request $request) {
        try {
            $userId = auth()->user()->id; // Get the logged-in user's ID
            $recipientUserId = $request->input('userid');
            $messageContent = $request->input('message'); // Assuming you have a 'message' field in the request
    
            // Retrieve the chat ID
            $chat = $this->getChatId($userId, $recipientUserId);
    
            if ($chat) {
                // Chat already exists, create a new message
                $newMessage = new Message();
                $newMessage->chat_id = $chat->id;
                $newMessage->user_id = $userId;
                $newMessage->content = $messageContent;
                $newMessage->save();
    
                return json_encode(['message' => 'sent']);
            } else {
                // Handle the case where the chat does not exist
                // Log::error('Chat does not exist. User ID: ' . $userId . ', Recipient ID: ' . $recipientUserId);
                return json_encode(['message' => 'Chat does not exist']);
            }
        } catch (\Exception $e) {
            // Handle the exception
            // Log::error('An error occurred: ' . $e->getMessage());
            return json_encode(['message' => 'An error occurred','error'=>$e->getMessage()]);
        }
    }
    

}
