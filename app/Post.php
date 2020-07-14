<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =
    ['title' , 'content', 'slug', 'updated_at', 'created_at', 'category_id'];

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
