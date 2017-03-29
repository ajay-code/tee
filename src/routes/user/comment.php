<?php
Route::get('posts/{post}/comments', 'CommentController@index')->name('comments');
Route::post('posts/{post}/comments', 'CommentController@addComment')->name('comment.add');
Route::get('posts/{post}/comments/{comment}', 'CommentController@show')->name('comment.show');
Route::get('posts/{post}/comments/{comment}/delete', 'CommentController@deleteComment')->name('comment.delete');