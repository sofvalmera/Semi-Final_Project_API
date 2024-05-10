<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::post('/verify-otp', [AuthController::class, 'verifyOTP'])->name('api.verify.otp');

// Route::middleware('auth:sanctum')->group(function () {
    Route::get('/getallusers', [UserController::class, 'getAllUsers']);
    Route::post('/insertuser', [UserController::class, 'createUser']);
    Route::delete('/deleteuser', [UserController::class, 'deleteUser']);

    Route::get('/getallposts', [PostController::class, 'getAllPosts']);
    Route::post('/insertpost', [PostController::class, 'createPost']);
    Route::delete('/deletepost', [PostController::class, 'deletePost']);
// });

