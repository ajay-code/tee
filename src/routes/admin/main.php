<?php
Route::get('/', 'Admin\MainController@index')->name('index');
Route::get('/home', 'Admin\MainController@index')->name('home');



Route::group(['prefix' => 'api'], function () {
	Route::get('/users/{user}', 'Admin\UserController@getUser')->name('index');
	Route::get('/users/{user}/activate', 'Admin\UserController@activate')->name('user.activate');
	Route::get('/users/{user}/deactivate', 'Admin\UserController@deactivate')->name('user.deactivate');
});

Route::get('/users', 'Admin\UserController@index')->name('index');
