<?php
Route::get('/', 'User\PostsController@index');
Route::get('/home', 'User\PostsController@index')->name('home');

Route::get('/chatlist', 'HomeController@chatlist')->name('chatlist');

Route::get('/notification/mark/read', 'HomeController@markNotificationRead');

