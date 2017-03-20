<?php

Route::get('/users/{user}', 'OtherUserController@find');
Route::get('/users/{user}/friendrequest', 'OtherUserController@sendFriendRequest')->name('friendrequest');
