<?php

Route::group(['prefix' => 'settings'], function () {
    // Route::resource('setting', 'User\SettingsController');
    Route::get('/', 'User\SettingsController@edit')->name('settings');
    Route::patch('/', 'User\SettingsController@update');
    Route::get('/online', ['as' => 'user.online', 'uses' => 'User\SettingsController@online']);
    Route::get('/offline', ['as' => 'user.offline', 'uses' => 'User\SettingsController@offline']);
    Route::get('/updatelastactivity', ['as' => 'user.lastactivity', 'uses' => 'User\SettingsController@updateLastActivity']);
});