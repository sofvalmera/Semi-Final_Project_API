<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\UserController;
// use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/',[FrontController::class,'index'])->name('front.home');
Route::get('/',[FrontController::class,'login'])->name('front.login');
// Route::get('/register',[FrontController::class,'register'])->name('front.register');
// Route::post('/register', [FrontController::class, 'processRegister1'])->name('account.processRegister');
Route::group(['middleware' => 'guest'], function () {
   
    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('admin.dashboard');

    Route::get('/posts/list',[PostController::class,'list'])->name('posts.list');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::get('/posts/edit',[PostController::class,'edit'])->name('posts.edit');
// Route::post('/posts',[PostController::class,'store'])->name('posts.store');
// Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
// Route::put('/posts/{post}',[PostController::class,'update'])->name('posts.update');
// Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.delete');

Route::get('/users/list',[UserController::class,'list'])->name('users.list');
Route::get('/users/create',[UserController::class,'create'])->name('users.create');
Route::get('/users/edit',[UserController::class,'edit'])->name('users.edit');
// Route::post('/users',[PostController::class,'store'])->name('users.store');
// Route::get('/users/{user}/edit',[PostController::class,'edit'])->name('users.edit');
// Route::put('/users/{user}',[PostController::class,'update'])->name('users.update');
// Route::delete('/users/{user}',[PostController::class,'destroy'])->name('users.delete');


    
    });
   

   




//sa user ni 
// Route::get('/register',[AuthController::class,'register'])->name('account.register');
// Route::post('/process-register',[AuthController::class,'processDioskoLordtaasapamani'])->name('account.processRegister');


