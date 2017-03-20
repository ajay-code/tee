<?php
Route::get('/locations', 'User\UserLocationController@locations')->name('user.locations');
Route::get('/locations/add', 'User\UserLocationController@addLocation')->name('user.addlocation');
Route::post('/locations/add', 'User\UserLocationController@storeLocation')->name('user.storelocation');
