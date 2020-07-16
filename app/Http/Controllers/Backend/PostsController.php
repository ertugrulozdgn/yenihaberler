<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostsController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->simplepaginate(20);

        return view('backend.Posts.index',compact('posts'));
    }






    public function create()
    {
        $categories = Category::all();
        return view('backend.Posts.create',compact('categories'));
    }





    public function store(Request $request)
    {
        $request->validate([
           'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required',
            'summary' => 'required',
            'content' => 'required'
        ]);


        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->input('category_id') ;
        $post->status = (int) $request->input('status');
        $post->location = (int) $request->input('location');
        $post->title = $request->input('title');
        $post->slug = Str::slug($post->title);
        $post->summary = $request->input('summary');
        $post->content = $request->input('content');
        $post->content2 = str_replace("&#39;","'",html_entity_decode(strip_tags($post->content)));
        //img
        $post_image=url('/').'/images/'.uniqid().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $post_image);
        $post->image = $post_image;
        $post->save();


        if ($post->save())
        {
            return back()->with('success','Kaydetme İşlemi Başarılı!');
        }

        return back()->with('error','Kaydetme İşlemi Başarısız!');



//        $post_image=$request->image->store('Posts','public');                    BÖYLEDE YAPILABİLİR(kendisi benzersiz şekilde isimlendirir resmi.)
//        $post->image = $post_image;

    }




    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('backend.Posts.edit',compact('post','categories'));
    }





    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => $request->hasFile('image') ? 'required|image|mimes:jpg,jpeg,png|max:2048' : '',
            'title' => 'required',
            'summary' => 'required',
            'content' => 'required'
        ]);

        $post = Post::find($id);
        if ($request->hasFile('image')) {


            $post->updated_by = auth()->user()->name;
            $post->category_id = $request->input('category_id') ;
            $post->status = $request->input('status');
            $post->location = $request->input('location');
            $post->title = $request->input('title');
            $post->slug = Str::slug($post->title);
            $post->summary = $request->input('summary');
            $post->content = $request->input('content');
            $post->content2 = str_replace("&#39;","'",html_entity_decode(strip_tags($post->content)));


            //img
            $post_image=url('/').'/images/'.uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $post_image);
            $post->image = $post_image;
            $post->save();

        } else {


            $post->updated_by = auth()->user()->name;
            $post->category_id = $request->input('category_id') ;
            $post->status = $request->input('status');
            $post->location = $request->input('location');
            $post->title = $request->input('title');
            $post->slug = Str::slug($post->title);
            $post->summary = $request->input('summary');
            $post->content = $request->input('content');
            $post->content2 = str_replace("&#39;","'",html_entity_decode(strip_tags($post->content)));
            $post->save();
        }


        if ($post->save())
        {
            return back()->with('success','Güncelleme İşlemi Başarılı!');
        }

        return back()->with('error','Güncelleme İşlemi Başarısız!');
    }





    public function destroy($id)
    {
        $post = Post::find(intval($id));  //ajax için intval ile id alıyoruz.
        if ($post->delete())              //Burayı if koşuluyla kontrol etmemin sebebei ajax kodunda msg ile kontrol ettiriyorum.
        {
            return 1;
        }
        return 0;
    }
}
