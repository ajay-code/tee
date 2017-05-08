<?php
Route::get('/places', 'User\PlaceController@places')->name('user.places');
Route::get('/places/add', 'User\PlaceController@addPlace')->name('user.place.add');
Route::post('/places/add', 'User\PlaceController@storePlace')->name('user.place.store');
Route::post('/places/delete', 'User\PlaceController@destroy')->name('user.place.delete');
