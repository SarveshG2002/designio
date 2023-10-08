<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Import the controller you want to use
use App\Http\Controllers\friendController;

// Define the route with proper authentication
Route::middleware(['auth:sanctum'])->group(function () {
    // Add your route here
    Route::post('/friend/followfriend', [friendController::class, 'followFriend']);
});


