<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //metto in relazione con il metodo posts (devo recuperare tutti i post)
    public function posts() {
        return $this->BelongsToMany('App\Post');
    }
}
