<?php
Route::get('/', 'User\PostsController@index');
Route::get('/home', 'User\PostsController@index')->name('home');
