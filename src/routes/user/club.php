<?php
Route::get('/clubs', 'User\UserClubController@locations')->name('user.clubs');
Route::get('/clubs/add', 'User\UserClubController@addLocation')->name('user.club.add');
Route::post('/clubs/add', 'User\UserClubController@storeLocation')->name('user.club.store');
Route::post('/clubs/delete', 'User\UserClubController@destroy')->name('user.club.delete');
