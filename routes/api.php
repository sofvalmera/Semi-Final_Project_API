<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/






Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
Route::post('/login', [AuthController::class, 'login']);
// Route::post('/register', [UserController::class, 'createUser']);
// Route::middleware('auth:api')->group(function(){
Route::get('/getallusers',[UserController::class,'getAllUsers']);
Route::post('/insertuser', [UserController::class, 'createUser']);
Route::delete('/deleteuser', [UserController::class, 'deleteUser']);

Route::get('/getallposts',[PostController::class,'getAllPosts']);
Route::post('/insertpost', [PostController::class, 'createPost']);
Route::delete('/deletepost', [PostController::class, 'deletePost']);
// Route::put('/edit', [UserController::class, 'UpdateUser']);
// Route::destroy('/delete', [UserController::class, 'deleteUser']);

// Route::get('/list',[PostController::class,'getAllPosts']);
// Route::post('/create', [PostController::class, 'createPost']);
// Route::put('/edit', [PostController::class, 'UpdatePost']);
// Route::destroy('/delete', [PostController::class, 'deletePost']);




// });

// Route::get('/users/list',[UserController::class,'list'])->name('users.list');
// Route::get('/users/create',[UserController::class,'create'])->name('users.create');
// Route::get('/users/edit',[UserController::class,'edit'])->name('users.edit');
// Route::post('/users',[PostController::class,'store'])->name('users.store');
// Route::get('/users/{user}/edit',[PostController::class,'edit'])->name('users.edit');
// Route::put('/users/{user}',[PostController::class,'update'])->name('users.update');
// Route::delete('/users/{user}',[PostController::class,'destroy'])->name('users.delete');
