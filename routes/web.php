<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

//Routes visibili a tutti
Route::get('/', 'HomeController@index')->name('home');


//Routes con autenticazione Admin
Route::prefix('admin')->namespace('Admin')->name('admin')->middleware('auth')->group(function(){
    Route::get('/', 'HomeController@index')->name('admin');
    Route::resource('posts' , 'PostController');

});
