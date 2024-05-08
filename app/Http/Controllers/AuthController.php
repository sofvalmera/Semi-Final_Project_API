<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
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
        
        if (Auth::attempt($request->only(['email', 'password']))) {

            //add tali tag pra sa otp ngari or maghimo laing function
            //tas ang .env ngita ag idea na gamay ray code na dali ra masabtan og masag o

            
            $user = User::where('email', $request->email)->first();
    
            return response()->json([
                'status' => true,
                'message' => 'LogIn Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken,
                'error' => Session::get('error'),
                'success' => Session::get('success'),
            ], 200);
        }
            return response()->json([
                'status' => false,
                'message' => 'Email & Password does not match.',
            ], 401);
    
        
    }
}