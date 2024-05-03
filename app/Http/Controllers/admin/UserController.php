<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
public function list(){
    return view('admin.user.list');
}
public function create(){
    return view('admin.user.create');
}
public function edit(){
    return view('admin.user.edit');
}
public function destroy($userId, Request $request)
    {
        $user = User::find($userId);
    
        if (empty($user)) {
            $request->session()->flash('error', 'User not found');
            return redirect()->route('admin.user.list')->with([
                'status' => false,
                'message' => 'User not found'
            ]);
        }
    
        // if ($user->role == 'Admin') {
        //     $request->session()->flash('error','  cant delete');
        //     return response()->json([
        //         'status' => false,
        //         'message' => ' You cannot delete the admin'
        //     ]);
    
        // } else {

            $user->delete();
            $request->session()->flash('success',' Delete Successfully');
            return response()->json([
                'status' => true,
                'message' => ' Delete Successfully'
            ]);
    
        // }
    }
}


?>