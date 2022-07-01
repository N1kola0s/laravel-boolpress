<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with(['tags','category'])->orderByDesc('id')->paginate(6);
        return $posts;
    }

    public function show($id){
        $post= Post::with (['tags', 'category'])->where('id', $id)->first();
        if($post){
            return $post;
        } else {
            ddd($post);
            return response () -> json([
               'status_code'=> 404,
               'status_text'=> 'not found'
        ]);
           }
       }

}
