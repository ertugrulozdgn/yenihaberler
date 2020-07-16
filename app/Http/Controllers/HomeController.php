<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Jorenvh\Share\Share;
use Jorenvh\Share\ShareFacade;

class HomeController extends Controller
{


    public function index()
    {
        $headlines = Post::where('location', 2)->where('status', 1)->orderBy('created_at','desc')->take(3)->get();
        $used_ids = $headlines->pluck('id')->toArray();

        $headlines_middle = Post::whereNotIn('id',$used_ids)->where('location', 2)->where('status', 1)->orderBy('created_at','desc')->take(1)->get();
        $used_ids_middle = $headlines_middle->whereNotIn('id',$used_ids)->pluck('id')->toArray();  //3 tane oldugu icin bu manşet 'sadece' id'lerini dizi şeklinde bir değiskene atadım.

        $used_ids = array_merge($used_ids, $used_ids_middle);


        $headlines_right = Post::whereNotIn('id',$used_ids)->where('location', 2)->where('status', 1)->orderBy('created_at','desc')->take(2)->get();
        $used_ids_right = $headlines_right->whereNotIn('id',$used_ids)->pluck('id')->toArray();

        $used_ids = array_merge($used_ids,$used_ids_right);

        $posts = Post::whereNotIn('id', $used_ids)->where('status', 1)->orderBy('created_at','desc')->paginate(15);

//        ShareFacade::page('http://127.0.0.1:8000/', null, ['title' => 'title'])
//            ->twitter();



        $postsViews = Post::where('status',1)->orderBy('hit','desc')->take(5)->get();

        $postTodayViews = Post::where('status',1)->where('created_at', '>', Carbon::today())->orderBy('hit','desc')->take(5)->get();

        return view('frontend.Posts.home',compact('headlines','headlines_middle','headlines_right','posts','postsViews','postTodayViews'));

    }





    public function search(Request $request)
    {
        $search = $request->search;
        if (!empty($search)) {

            $posts = Post::where('title', 'like','%'.$search.'%')->paginate(10);

           if (count($posts) > 0) {

               $postsViews = Post::where('status',1)->orderBy('hit','desc')->take(5)->get();

               $postTodayViews = Post::where('status',1)->where('created_at', '>', Carbon::today())->orderBy('hit','desc')->take(5)->get();

               return view('frontend.Posts.search',compact('posts','postsViews','postTodayViews','search'));

           } else

               return back()->with('error2','Eşleşen Yok!');

        } else
        return back()->with('error1','Alanı Boş Bıraktınız!');


    }


    public function show($slug)
    {
        $category = Category::where('slug',$slug)->first();

        $posts = Post::where('category_id', $category->id)->where('status',1)->orderBy('created_at','desc')->paginate(15);

        $postsViews = Post::where('status',1)->orderBy('hit','desc')->take(5)->get();

        $postTodayViews = Post::where('status',1)->where('created_at', '>', Carbon::today())->orderBy('hit','desc')->take(5)->get();


        return view('frontend.Posts.categories',compact('posts','category','postsViews','postTodayViews'));


    }

}
