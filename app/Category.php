<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title','slug'];


    public function posts()
    {
        return Post::where('category_id',$this->id)->get();
    }


    public function getLinkAttribute()
    {
        return action('HomeController@show',['slug' => $this->slug]);
    }
}
