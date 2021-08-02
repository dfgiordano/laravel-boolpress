<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        //recupero i posts come faccio di solito, e devo importare il model Post per poterlo utilizzare
        $posts = Post::all();
        //devo passarli al json che li passerà alla rotta api che ho creato
        return response()->json($posts);
    }
    //definisco la nuova rotta, che gestirà la pagina nel dettaglio del post, parametro slug, recuperando dai post il post cn quel determinato parametro
    public function show($slug) {
        $post = Post::where('slug', $slug)->first();

        return response()->json($post);
    }
}
