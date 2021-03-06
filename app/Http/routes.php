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
Route::post('posts/read-post', 'HomePostController@readPost');
Route::get('mybook', 'HomePostController@myPost');


Route::group(['middleware' => 'role'], function()
    {
        Route::resource('dashboard/users', 'UserController');
        Route::get('dashboard', 'DashboardController@index');
        Route::resource('dashboard/posts', 'PostController');

    });

    Route::get('deposit', 'HomePostController@deposit');
    Route::post('deposit/pay-via-paypal', 'PaymentController@postPayment');
    Route::get('deposit/payment-success', 'PaymentController@getSuccessPayment');
    Route::get('deposit/cancel-deposit', 'PaymentController@cancelOrderPayment');


//Route::post('dashboard/posts/destroy', );
Route::resource('posts', 'HomePostController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
