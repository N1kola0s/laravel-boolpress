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
        return $post;
    }
}
