<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Import the controller you want to use
use App\Http\Controllers\friendController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ChatController;

// Define the route with proper authentication
Route::middleware(['auth:sanctum'])->group(function () {
    // Add your route here
    Route::post('/friend/followfriend/{id}', [friendController::class, 'followFriend']);
    Route::post('/post/likepost/{id}', [PostController::class, 'likepost']);
    // Route::post('/chat/my-chat',function (){
    //     return json_encode(['message'=>"sent"]);
    // });
    Route::post('/chat/my-chat',[ChatController::class, 'sendmsg']);

});




