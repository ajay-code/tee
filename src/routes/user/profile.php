<?php
Route::get('/profile', 'User\UserProfileController@index')->name('user.profile');
Route::get('/profile/edit', 'User\UserProfileController@edit')->name('user.editprofile');
Route::post('/profile/edit', 'User\UserProfileController@update')->name('user.updateprofile');
Route::post('/profile/photo', 'User\UserProfileController@updateAvatar')->name('user.updateavatar');


// Terms Accepted
Route::post('/terms/accepted', 'User\UserProfileController@termsAccepted')->name('user.termsaccepted');
