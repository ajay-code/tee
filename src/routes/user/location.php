<?php
Route::get('/locations', 'User\LocationController@locations')->name('user.locations');

Route::get('/locations/add', 'User\LocationController@addLocation')->name('user.location.add');
Route::post('/locations/add', 'User\LocationController@storeLocation')->name('user.location.store');

Route::get('/locations/update', 'User\LocationController@editLocation')->name('user.location.edit');
Route::post('/locations/update', 'User\LocationController@updateLocation')->name('user.location.update');

Route::post('/locations/delete', 'User\LocationController@destroy')->name('user.location.delete');
