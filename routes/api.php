<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'auth\AuthController@login');
    Route::post('logout', 'auth\AuthController@logout');
    Route::post('refresh', 'auth\AuthController@refresh');
    Route::post('me', 'AuthController@me');
});


Route::group(['middleware' => ['jwt.auth'],'prefix' => 'user'], function () {
    Route::get('posts', 'dashbord\PostController@index');
    Route::post('/posts/store', 'dashbord\PostController@store');
    Route::put('/posts/update/{id}', 'dashbord\PostController@update');
    Route::delete('/posts/delete/{id}', 'dashbord\PostController@delete');
});
