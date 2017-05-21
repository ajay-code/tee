<?php

Route::group(['prefix' => 'settings'], function () {
    Route::get('/online', ['as' => 'user.online', 'uses' => 'User\SettingsController@online']);
    Route::get('/offline', ['as' => 'user.offline', 'uses' => 'User\SettingsController@offline']);
    Route::get('/updatelastactivity', ['as' => 'user.lastactivity', 'uses' => 'User\SettingsController@updateLastActivity']);
});