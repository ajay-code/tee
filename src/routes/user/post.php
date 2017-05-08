<?php
Route::resource('/posts', 'User\PostsController');
Route::get('/posts/{post}/like', 'User\PostsController@likePost')->name('post.like');
Route::get('/posts/{post}/unlike', 'User\PostsController@unlikePost')->name('post.unlike');
