<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

public function login(Request $request)
{
    $validateUser = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if ($validateUser->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'Validation error',
            'errors' => $validateUser->errors()
        ], 401);
    }
    
    if (!Auth::attempt($request->only(['email', 'password']))) {
        // return redirect()->route('front.login')->with('error','Dili ka Pwede ngari! Pang Admin ra ni!');        
        // $request->session()->flash('error',' Email & Password does not match.');
        return response()->json([
            'status' => false,
            'message' => 'Email & Password does not match.',
        ], 401);
    }

    $user = User::where('email', $request->email)->first();

    return response()->json([
        'status' => true,
        'message' => 'LogIn Successfully',
        'token' => $user->createToken("API TOKEN")->plainTextToken
    ], 200);
}
}