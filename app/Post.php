<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{
    protected $fillable = ['title', 'content'];
    protected $dates = ['deleted_at'];

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

}