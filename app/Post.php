<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    protected $fillable = [
        'title',
        'post',
        'slug',
        'category_id'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    //metto in relazione con il metodo tags (devo recuperare tutti i tags)
    public function tags() {
        return $this->BelongsToMany('App\Tag');
    }
}
