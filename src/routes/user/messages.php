<?php
Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::get('user/{id}', ['as' => 'messages.user.show', 'uses' => 'MessagesController@show']);
    Route::put('user/{id}', ['as' => 'messages.user.update', 'uses' => 'MessagesController@update']);
    // Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

Route::group(['prefix' => 'api/messages'], function () {
	Route::get('user/{id}', ['as' => 'messages.user.show.api', 'uses' => 'MessagesController@getChat']);
});

Route::get('chats', 'MessagesController@friends')->name('messages.chats');