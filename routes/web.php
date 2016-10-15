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


Route::get('/login', function () {
    return view('pages.login');
});

Route::get('/register', [
    'as' => 'auth.getRegister',
    'uses' => 'Auth\AuthController@getRegister'
]);


Route::post('/register', [
    'as' => 'auth.postRegister',
    'uses' => 'Auth\AuthController@postRegister'
]);

