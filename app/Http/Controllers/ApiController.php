<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();

        return response()->json( $posts);
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
        $post->content = strip_tags($post->content);
        $post->save();


        return response()->json('Yazı Eklendi');

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
            $post->content = strip_tags($post->content);
            $post->save();

        } else {


            $post->updated_by = auth()->user()->name;
            $post->category_id = $request->input('category_id') ;
            $post->status = $request->input('status');
            $post->location = $request->input('location');
            $post->title = $request->input('title');
            $post->slug = Str::slug($post->title);
            $post->summary = $request->input('summary');
            $post->content = strip_tags($post->content);
            $post->save();
        }


        return response()->json('Yazı Güncellendi');

    }


    public function destroy($id)
    {
        $post = Post::find($id);  //ajax için intval ile id alıyoruz.
        $post->delete();             //Burayı if koşuluyla kontrol etmemin sebebei ajax kodunda msg ile kontrol ettiriyorum.

        return response()->json('Yazı Silindi');


    }
}
