<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class AuthPostsController extends Controller
{
    public function index(){
        $posts = Post::where('user_id',auth()->user()->id)->orderby('id','desc')->simplepaginate(20);
        return view('backend.Posts.authPost',compact('posts'));
    }
}
