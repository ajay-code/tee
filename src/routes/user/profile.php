<?php
Route::get('/profile', 'UserProfileController@index')->name('userprofile');
Route::get('/profile/edit', 'UserProfileController@edit');
Route::post('/profile/edit', 'UserProfileController@update')->name('updateprofile');
Route::post('/profile/photo', 'UserProfileController@updateAvatar')->name('updateavatar');
