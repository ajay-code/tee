<?php
Route::get('/friendrequests', 'FriendController@showFriendRequests')->name('user.friendrequest');
Route::get('/friendrequests/accept/{sender}', 'FriendController@acceptFriendRequests')->name('user.friendrequest.accept');
Route::get('/friendrequest', 'FriendController@showFriendList')->name('user.friends');

