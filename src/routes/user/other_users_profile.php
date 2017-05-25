<?php

Route::get('/users/{user}', 'OtherUserController@find')->name('other.user.profile');
Route::get('/users/{user}/friendrequest', 'OtherUserController@sendFriendRequest')->name('friendrequest');

/*User Friend list*/
Route::get('/users/{user}/friends', 'FriendController@usersFriends')->name('other.user.friends');
Route::get('/users/{user}/info', 'User\UserProfileController@userInformation')->name('other.user.profileinfo');