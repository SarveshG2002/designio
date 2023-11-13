<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ChatController;
// use App\Http\Middleware\CheckUserSession;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Login routes

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/profile', [AuthController::class, 'showProfileForm']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::get('/logout', [AuthController::class, 'logout']);
Route::middleware(['check.session'])->group(function () {
    Route::get('/home', [AuthController::class, 'home']);
    Route::get('/explore', [AuthController::class, 'explore']);
    Route::get('/friends', [AuthController::class, 'friends']);
    Route::get('/group', [AuthController::class, 'group']);
    Route::get('/trending', [AuthController::class, 'trending']);
    Route::get('/setting', [AuthController::class, 'setting']);
    Route::post('/post/addpost', [PostController::class, 'addNewPost']);
    Route::get('/chat/{fid}',[ChatController::class,'getMyChat']);
});



Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// Add more authentication routes (password reset, logout, etc.) as needed.
