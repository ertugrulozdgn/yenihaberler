<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function show(string $slug, int $id) {

        $post = Post::where('id',$id)->where('status',1)->first();

        $otherPosts = Post::whereNotIn('id',[$post->id])->where('status',1)->inRandomOrder()->limit(6)->get();  //WhereNotIn(value,array)

        abort_if(empty($post),404);

        $post->hit = $post->hit + 1;

        $post->save();


        $postsViews = Post::where('status',1)->orderBy('hit','desc')->take(5)->get();

        $postTodayViews = Post::where('status',1)->where('created_at', '>', Carbon::today())->orderBy('hit','desc')->take(5)->get();

        return view('frontend.Posts.detail',compact('post','otherPosts','postsViews','postTodayViews'));
    }




}
