<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

//Routes visibili a tutti
Route::get('/', 'HomeController@index')->name('home');
Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/{slug}', 'PostController@show')->name('posts.show');


//Routes con autenticazione Admin
Route::prefix('admin')->namespace('Admin')->name('admin')->middleware('auth')->group(function(){
    Route::get('/', 'HomeController@index')->name('admin');
    Route::resource('posts' , 'PostController');

});
