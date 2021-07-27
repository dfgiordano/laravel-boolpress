<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //nome singolare o plurale in base a che relazione c'è 1 categoria - tanti post
    public function posts() {
        return $this->hasMany('App\Post');
    }
}
