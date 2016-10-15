<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
});


Route::get('/register', [
    'as' => 'auth.register',
    'uses' => 'Auth\AuthController@getRegister'
]);


Route::post('/register', [
    'as' => 'auth.register',
    'uses' => 'Auth\AuthController@postRegister'
]);

Route::get('/login', [
    'as' => 'auth.login',
    'uses' => 'Auth\AuthController@getLogin'
]);


Route::post('/login', [
    'as' => 'auth.login',
    'uses' => 'Auth\AuthController@postLogin'
]);

