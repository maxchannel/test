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
Route::group(['prefix' => 'i', 'middleware' => ['auth']], function () {
    //Logout
    Route::get('/logout', ['as' => 'logout', 'uses' => 'AuthController@logout'])

    //post
    Route::get('/add/post', ['as' => 'post_client', 'uses' => 'postController@create']);
    Route::post('/add/post', ['as' => 'post_client_store', 'uses' => 'postController@store']);
    Route::get('/edit/post/{id}', ['as' => 'edit_post', 'uses' => 'postController@edit']);
    Route::put('/edit/post/{id}', ['as' => 'edit_post_store', 'uses' => 'postController@update']);

});