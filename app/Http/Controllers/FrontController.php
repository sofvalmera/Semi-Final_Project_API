<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class FrontController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(){
        return view('front.home');

        
    }
    public function login(){
        return view('front.account.login');

        
    }
    public function register(){
        return view('front.account.register');
        

        
    }
   
//temporary pa ni diria utrohon pa ni diris register
    // public function processRegister1(Request $request){

    //     $validator =Validator::make($request->all(),[
    //         'name' => 'required|min:3',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|min:5|confirmed',
    //     ]);
    //     if($validator->passes()){
    //         $user=new User();
    //         $user-> name= $request->name;
    //         $user->email = $request->email;
    //         $user->phone = $request->phone;
    //         $user->password =Hash::make($request->password); 
    //         $user->save();

          


    //        session()->flash('success',' You have been Registered Successfully');
    //         return response()->json([
    //             'status' => true,
    //             'message' => ' Added Successfully'
    //         ]);
     
    //     }else{
    //         return response()->json([
    //             'status' => false,
    //             'errors' => $validator->errors(),
    //         ]);
    //     }


     
    // }
}
