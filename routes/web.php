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

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard', [
        'as' => 'dashboard.index',
        'uses' => 'DashboardController@index'
    ]);

    // show all users
    Route::get('/dashboard/users', [
        'as' => 'users.index',
        'uses' => 'UsersController@index'
    ]);

    // show form create new user
    Route::get('/dashboard/users/create', [
        'as' => 'users.create',
        'uses' => 'UsersController@create'
    ]);

    // create new user
    Route::post('/dashboard/users', [
        'as' => 'users.store',
        'uses' => 'UsersController@store'
    ]);

});

Route::delete('/users/{id}', [
    'as' => 'users.destroy',
    'uses' => 'UsersController@destroy'
]);

Route::put('/users/{id}', [
    'as' => 'users.update',
    'uses' => 'UsersController@update'
]);

Route::get('/users/{id}/edit', [
    'as' => 'users.edit',
    'uses' => 'UsersController@edit'
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

Route::get('/logout', [
    'as' => 'auth.logout',
    'uses' => 'Auth\AuthController@getLogout'
]);
