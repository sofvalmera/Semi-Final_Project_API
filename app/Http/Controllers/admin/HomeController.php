<?php

namespace App\Http\Controllers\admin;
use App\Models\User;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
     
   public function dashboard(){
    // $countm = Member::count();
        // $countm = Member::where('role_name', 'Spectator') ->count();
        $countusers = User::count();
        $countposts = Post::count();
       

        return view('admin.dashboard', [
            'countusers' => $countusers,
            'countposts' => $countposts,
        ]);
  //    return view('admin.dashboard');
   }
}
