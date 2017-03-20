<?php

/*
* Resource for Club
*/
Route::get('/clubs', 'ClubController@index')->name('clubs');
Route::get('/clubs/create', 'ClubController@create')->name('club.create');
Route::post('/clubs/store', 'ClubController@store')->name('club.store');
