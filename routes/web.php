<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//rotte pubbliche
// Route::get('/', 'HomeController@index')->name('home');


//dentro questo auth::route ci sono tutte le rotte dell'autenticazione
Auth::routes();
// Auth::routes(['verify'=>true]);  ex array associativo, in questo caso tolgo la verifica dell'email


Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function() {

        Route::get('/', 'HomeController@index') -> name('home');

        //genero le sette rotte (nome dell'url + nome del controller) e le inserisco qui dentro perchè devo essere protette
        Route::resource('posts', 'PostController');

        //creare la singola rotta per categories-show
        Route::get('/categories/{category}', 'CategoryController@show')->name('categories.show');
    
});

Route::get('{any?}', function() {
    return view('guest.home');
}) -> where('any', '.*')->name('home');