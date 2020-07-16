<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::simplepaginate(20);
        return view('backend.Categories.index',compact('categories'));
    }


    public function create()
    {
        return view('backend.Categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);


        $category = new Category;
        $category->title = $request->input('title');
        $category->slug = Str::slug($category->title);
        $category->save();

        if ($category->save())
        {
            return back()->with('success','Kaydetme İşlemi Başarılı!');
        }

        return back()->with('error','Kaydetme İşlemi Başarısız!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);

        $category = Category::find($id);
        $category->title = $request->input('title');
        $category->slug = Str::slug($category->title);
        $category->save();

        if ($category->save())
        {
            return back()->with('success','Kaydetme İşlemi Başarılı!');
        }

        return back()->with('error','Kaydetme İşlemi Başarısız!');
    }


    public function destroy($id)
    {

        $category = Category::find(intval($id));    //ajax için intval ile id alıyoruz.
        if ($category->delete())                    //Burayı if koşuluyla kontrol etmemin sebebei ajax kodunda msg ile kontrol ettiriyorum.
        {
            return 1;
        }
        return 0;
    }
}
