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

    public function getMyChat($fid, Request $request) {
        $userId = auth()->user()->id; // Get the logged-in user's ID
        $recipientUserId = $fid; // Get the recipient user's ID
    
        // Check if a chat already exists based on the user IDs
        $chat = $this->getChatId($userId, $recipientUserId);
    
        if (!$chat) {
            // Chat does not exist, create a new chat
            $newChat = new Chat();
            $newChat->user1_id = $userId;
            $newChat->user2_id = $recipientUserId;
            $newChat->save();
        }
    
        // Now, whether the chat already existed or was just created, you can fetch the messages for this chat
        $messages = Message::where('chat_id', $chat->id)->get();
    
        $friendController = new friendController();
        $friendData = $friendController->getMyfriendChat($fid);
        $friends = $friendController->getFriends($request);
        $friends['mydata'] = $friendData[0];
        $friends['user_id'] = $fid;
        $friends['messages'] = $messages; // Pass the messages to the view
    
        return view('user.chat', $friends);
    }

    public function getAllNewChat() {
        $userId = auth()->user()->id;
    
        $chats = Chat::select('chats.id as chat_id', 'users.id as user_id', 'users.name', 'messages.content', 'messages.created_at as last_message_time')
            ->join('users', function ($join) use ($userId) {
                $join->on('chats.user1_id', '=', 'users.id')
                    ->where('chats.user2_id', '=', $userId)
                    ->orWhere('chats.user2_id', '=', $userId)
                    ->where('chats.user1_id', '=', 'users.id');
            })
            ->leftJoin('messages', function ($join) {
                $join->on('chats.id', '=', 'messages.chat_id')
                    ->whereRaw('messages.id = (select max(id) from messages where messages.chat_id = chats.id)');
            })
            ->orderByDesc('last_message_time')
            ->get();
    
        return $chats;
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
