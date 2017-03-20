<?php
Route::get('/clubs', 'ClubController@all')->name('clubs.all');
Route::get('/locations', 'UserLocationController@locationsAll')->name('user.locations.all');
// Route::get('/locations/all', 'UserLocationController@locationsAll')->name('user.locations.all');
