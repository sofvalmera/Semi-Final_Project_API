<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    
    public function getAllPosts(){
        $posts = Post::all();
        if ($posts->isEmpty()) {
            return [
                'status' => 404,
                'error' => 'Empty! Please Add post!'
            ];
        }
        else{
            return response()->json($posts);
            // return [
            //     'status' => 200,
            //     'message' => 'Data found',
            //     'data' => $posts
            // ];
        }
        
    }


    public function createPost(Request $request)
    {
        if ($request->METHOD() !== 'POST') {
            return response()->json(['message' => 'POST method required.'], 400);
        }
    
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'author' => 'required|string',
            'projectname' => 'required|string',
            'publisheddate' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }
    
        $post = new Post();
        $post->title = $request->input('title');
        $post->author = $request->input('author');
        $post->projectname = $request->input('projectname');
        $post->publisheddate = $request->input('publisheddate');
    
       
    
        if ($post->save()) {
            return response()->json([
                'message' => 'Inserted Successfully.',
                
            ], 200);
        } else {
            return response()->json(['message' => 'Insert failed.'], 500);
        }
    }

    public function deletePost(Request $request)
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

    $post = Post::find($id);

    if (!$post) {
        return response()->json(['message' => 'post Not Found.'], 404);
    }

    if ($post->delete()) {
        return response()->json(['message' => 'post deleted successfully.'], 200);
    } else {
        return response()->json(['message' => 'Failed to delete post.'], 500);
    }
}

   
   
}