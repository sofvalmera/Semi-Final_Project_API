<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use 

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

            // $otp= 
            $user = Auth::user();
            // $phonenumber
            $code = rand(100000, 999999);
            $user->update([
                'otp_code' => $code,
            ]);

            // Http::withoutVerifying()->post('https://api.semaphore.co/api/v4/messages', [
                //     'apikey' =>config('services.semaphore_key.key'),
                //     'number' => '09201985437', 
                //     'message' => 'This is your OTP code: ' . $code,
                // ]);
            // $token = auth()->user()->createToken('Test')->plainTextToken;

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
    public function verifyotp(Request $request){
        try{

            $request->validate([
                'otp' => 'required|min:6|max:6',
            ]);

        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();


            if (!$user->otp_code) {
                return response()->json([
                    'status' => false,
                    'message' => 'No OTP code found for the user'
                ], 400);
            }
        
            if ($request->otp === $user->otp_code) {
                return response()->json([
                    'status' => true,
                    'message' => 'OTP verification successful'
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid OTP'
                ], 400);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'User not authenticated'
            ], 401);
        }

        }catch(\Throwable $h){
            return response()->json([
                'status' => false,
                'message' => $h->getMessage()
            ], 500);
        }
    }
    

   

    

}