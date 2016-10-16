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


Route::get('/dashboard', [
    'as' => 'dashboard.index',
    'uses' => 'DashboardController@index'
]);

Route::get('/dashboard/manage_users', [
    'as' => 'dashboard.index',
    'uses' => 'UsersController@index'
]);


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

Route::delete('/users/{id}', [
    'as' => 'users.destroy',
    'uses' => 'UsersController@destroy'
]);

Route::get('/users/{id}/edit', [
    'as' => 'users.edit',
    'uses' => 'UsersController@edit'
]);