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
        if ($request->METHOD() !== 'POST') {
            return response()->json(['message' => 'POST method required.'], 400);
        }
    
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => 'required|digits_between:1,11|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:4',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }
    
        $user = new User();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')); 
    
        $existingUser = User::where('email', $user->email)->first();
        if ($existingUser) {
            return response()->json(['message' => 'Email already exists.'], 400);
        }
    
        if ($user->save()) {
            return response()->json([
                'message' => 'Inserted Successfully.',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } else {
            return response()->json(['message' => 'Insert failed.'], 500);
        }
    }

    public function deleteUser(Request $request)
{
    if ($request->method() !== 'DELETE') {
        return response()->json(['message' => 'DELETE method required.'], 400);
    }

    $validator = Validator::make($request->all(), [
        'id' => 'required|integer'
    ], [
        'id.required' => 'The id field is required.'
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 400);
    }

    $id = $request->input('id');

    $user = User::find($id);

    if (!$user) {
        return response()->json(['message' => 'User Not Found.'], 404);
    }

    if ($user->delete()) {
        return response()->json(['message' => 'User deleted successfully.'], 200);
    } else {
        return response()->json(['message' => 'Failed to delete user.'], 500);
    }
}

   
   
}