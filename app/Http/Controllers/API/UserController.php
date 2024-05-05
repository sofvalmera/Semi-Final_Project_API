<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
    public function getAllUsers(){
        $users = User::all();
        if ($users->isEmpty()) {
            return [
                'status' => 404,
                'error' => 'Empty! Please Add User!'
            ];
        }
        else{
            return response()->json($users);
            // return [
            //     'status' => 200,
            //     'message' => 'Data found',
            //     'data' => $users
            // ];
        }
        
    }

    public function createUser(Request $request)
    {
        $newUser = [
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => $request['password']
        ];

        $created = User::create($newUser);

        if (!$created) {
            return [
                'status' => 500,
                'error' => 'User Creation Failed'
            ];
        }

        return [
            'status' => 201,
            'message' => 'User Created Successfully'
        ];
    }

    // public function createUser(Request $request)
    // {
    //     try {
          
    //         $validateUser = Validator::make($request->all(), 
    //         [
    //             'name' => 'required',
    //             'phone'=> 'required',
    //             'email' => 'required|email|unique:users,email',
    //             'password' => 'required',
              
             
    //         ]);

    //         if($validateUser->fails()){
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => 'error',
    //                 'errors' => $validateUser->errors()
    //             ], 401);
    //         }

    //         $user = User::create([
    //             'name' => $request->firstname,
    //             'phone'=> $request->phone,
    //             'email' => $request->email,
    //             'password' => Hash::make($request->password),
               
                
    //         ]);

    //         return response()->json([
    //             'status' => true,
    //             'message' => 'User Created Successfully',
    //             'token' => $user->createToken("API TOKEN")->plainTextToken
    //         ], 200);

    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => $th->getMessage()
    //         ], 500);
    //     }
    // }

  
    public function login(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
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

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}