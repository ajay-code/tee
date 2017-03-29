<?php

Route::get('/users/{user}', 'OtherUserController@find')->name('other.user.profile');
Route::get('/users/{user}/friendrequest', 'OtherUserController@sendFriendRequest')->name('friendrequest');
