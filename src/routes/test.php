<?php
/*Test Routes*/

Route::get('/test', 'TestController@index');
Route::group(['middleware' => 'guest'], function(){
	Route::get('/test/2', function(){
		alert()->info('sdfsd');
		return redirect('/test/3');
	});
	Route::get('/alter/login', function(){
		// alert()->info('sdfsd');
		return view('auth.login');
	});
	Route::get('/test/3', function(){
		// alert()->info('sdfsd');
		return view('auth.login');
	});
	Route::get('/error', function(){
		return view('auth.error');
	});


});
