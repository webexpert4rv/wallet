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

Route::get('/', function () {
    return view('welcome');
});


//// Authentication routes...
//Route::get('auth/login', 'Auth\AuthController@getLogin');
//Route::post('auth/login', 'Auth\AuthController@postLogin');
//Route::get('auth/logout', 'Auth\AuthController@getLogout');
//
//// Registration routes...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Route::get('home','UserController@home');
//Route::get('invalid-login-detected','UserController@LoginFailDetected');
//Route::get('invalid-registration-detected','UserController@RegistrationFailDetected');

Route::post('auth/login','UserController@login');
Route::get('auth/verify-token','AuthenticateController@getAuthenticatedUser');
Route::post('payment_credited',['middleware' => 'jwt.auth','as' => 'testroute', 'uses' => 'UserAccountsController@payment_credited']);
Route::get('show_balance','UserAccountsController@show_balance');
Route::resource('products','ProductsController');
Route::resource('orders','OrdersController');
test
