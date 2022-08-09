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

/* Route::get('/', function () {
    return view('home');
}); */

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::middleware("auth")
    ->namespace("Admin") // indica la cartella dove si trovano i controller
    ->name("admin.") // Aggiungie prima del nome di ogni rotta questo prefisso
    ->prefix("admin") // Aggiunge prima di ogni URI questo pregisso
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('index');

        Route::resource("posts", "PostController");
    });
