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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    
Route::get('/posts', 'PostsController@index')->name('posts.index');

Route::get('/posts/create', 'PostsController@create')->name('posts.create');

Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');

Route::delete('/posts/{post}', 'PostsController@delete')->name('posts.delete');

Route::put('/posts/{post}', 'PostsController@update')->name('posts.update');

Route::get('/posts/{post}/edit', 'PostsController@edit')->name('posts.edit');

Route::post('/posts', 'PostsController@store')->name('posts.store');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
