<?php
require('test.php');
/* User Login Routes */
Auth::routes();

/*Account verification*/
Route::get('register/confirm/{token}', 'Auth\ActivationController@confirmEmail');

/*Resend Account Email verification*/
Route::get('confirmation/resend', 'Auth\ActivationController@show');
Route::post('confirmation/resend', 'Auth\ActivationController@resend');


/* Social Login Routes */
Route::get('/login/facebook', 'Auth\SocialLoginController@facebookRedirect');
Route::get('/login/facebook/callback', 'Auth\SocialLoginController@facebookCallback');

Route::get('/login/google', 'Auth\SocialLoginController@googleRedirect');
Route::get('/login/google/callback', 'Auth\SocialLoginController@googleCallback');

Route::get('/login/twitter', 'Auth\SocialLoginController@twitterRedirect');
Route::get('/login/twitter/callback', 'Auth\SocialLoginController@twitterCallback');



Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

