<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index(){
        header("Content-type:text/html;charset=utf-8");
        return Post::paginate(10);
    }
    public function show(Post $post){
       return $post;
    }
}
