<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//creo un gruppo per gestie tutte le rotte api così cme avevamo fatto per quelle admin
Route::namespace('Api')
        ->group(function() {
            Route::get('/posts','PostController@index');
            //aggiungo la nuova rotta che andrà a gestire la pagina del dettaglio del post
            Route::get('/posts/{slug}','PostController@show');
        });

