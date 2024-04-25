<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
public function list(){
    return view('admin.post.list');
}
public function create(){
    return view('admin.post.create');
}
public function edit(){
    return view('admin.post.edit');
}
}


?>