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
}


?>