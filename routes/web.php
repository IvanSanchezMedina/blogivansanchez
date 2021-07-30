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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function () {

    //Rutas de posts
    Route::get('post.index','PostController@index')->name('post.index');
    Route::get('post.create','PostController@create')->name('post.create');
    Route::get('post.edit/{post}','PostController@edit')->name('post.edit');
    Route::post('post.update/{id}','PostController@update')->name('post.update');
    Route::get('post.delete/{post}','PostController@destroy')->name('post.destroy');
    Route::post('post.store','PostController@store')->name('post.store');
    Route::get('post.show/{id}','PostController@show')->name('post.show');

    //Rutas de comentarios
    Route::post('comment.store','CommentController@store')->name('comment.store');
    Route::get('comment.delete/{comment}','CommentController@destroy')->name('comment.destroy');

});