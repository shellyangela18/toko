<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts', 'PostController@index')->name('indexPost');
Route::get('/detail/{slug}','PostController@show');
Route::get('/user/{id}','UserController@show');
Route::get('/theme',function(){
    return view('layouts.apps');
    });
