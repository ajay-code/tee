<?php
Route::get('/clubs', 'ClubController@all')->name('clubs.all');
Route::get('/user/clubs', 'User\UserClubController@locationsAll')->name('user.clubs.all');
Route::get('/user/locations', 'User\LocationController@locationsAll')->name('user.locations.all')->middleware('auth');
Route::get('/user/places', 'User\PlaceController@placesAll')->name('user.places.all')->middleware('auth');


