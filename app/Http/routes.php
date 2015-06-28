<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Home
Route::get('/', 'HomeController@index');
Route::get('posts/{id}/show/{slug}', 'HomePostController@show');
//Route::resource('posts', 'HomePostController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('dashboard', 'DashboardController@index');
Route::resource('dashboard/posts', 'PostController');

Route::get('deposit/pay-via-paypal', 'PaymentController@postPayment');
Route::get('deposit/payment-success', 'PaymentController@getSuccessPayment');
Route::get('deposit/cancel-deposit', 'PaymentController@cancelOrderPayment');
