<?php

namespace App;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable = ['title','slug','content','category_id','user_id','summary','status','location','published_at'];

    protected function serializeDate(DateTimeInterface $date) : string  // Api created_at istemediğim formatta veriyordu iso801 formatında
    {
        return $date->format('Y-m-d H:i');
    }


    public function getUserAttribute()
    {
        return User::find($this->user_id);
    }



    public function getCategoryAttribute()
    {
        return Category::find($this->category_id);
    }



    public function getLocationNameAttribute() //$post->location_name
    {
        switch ($this->location){
            case 1:
                return 'Normal';
                break;
            case 2:
                return 'Manşet';
                break;
            default:
                return 'Normal';
                break;
        }
    }


    public function getLinkAttribute()
    {
        return action('Frontend\DetailController@show',['slug' =>$this->slug, 'id' => $this->id]);
    }


    public static function boot()
    {
        parent::boot();
        static::creating(function ($post)
        {
            $user = Auth::user();
            $post->user_id = $user->id;
            $post->updated_by = $user->name;
        });

        static::updating(function($post)
        {
//            $user = Auth::user();
//            $post->updated_by = $user->name;
        });
    }



}
