<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

//Guest users
Route::group(['prefix' => 'i', 'middleware' => ['guest']], function () {
    //Login
    Route::get('/login', ['as' => 'login', 'uses' => 'AuthController@login']);
    Route::post('/login', ['as' => 'loginSend', 'uses' => 'AuthController@loginSend']);
    //Singup
    Route::get('/signup', ['as' => 'signup', 'uses' => 'AuthController@signup']);
    Route::post('/signup', ['as' => 'signupStore', 'uses' => 'AuthController@signupStore']);     
});

//Auth users
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    //Logout
    Route::get('/logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

    //post

    Route::get('/add/post', ['as' => 'post_add', 'uses' => 'PostController@create']);
    Route::post('/add/post', ['as' => 'post_create', 'uses' => 'PostController@store']);
    Route::get('/edit/post/{id}', ['as' => 'post_edit', 'uses' => 'PostController@edit']);
    Route::put('/edit/post/{id}', ['as' => 'post_edit_store', 'uses' => 'PostController@update']);

    //ver
    Route::get('/post/{id}/{slug} ', ['as' => 'post_show', 'uses' => 'PostController@show']);

});