<?php

/*Friend Requests*/
Route::get('/friendrequests', 'FriendController@showFriendRequests')->name('user.friendrequest');
Route::get('/friendrequests/accept/{sender}', 'FriendController@acceptFriendRequests')->name('user.friendrequest.accept');
Route::get('/friends', 'FriendController@showFriendList')->name('user.friends');
Route::get('/unfriend/{user}', 'FriendController@unfriend')->name('unfriend');

/*Find Friends*/
Route::get('/friends/find', 'FriendController@findFriends')->name('user.find.friends');

/*Find Friends Using PLace*/
// Route::get('/friends/find', 'FriendController@findFriends')->name('user.find.friends');
