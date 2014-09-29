<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');
//

// Confide routes
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');



Route::get('patients/reception', function(){
    return View::make('reception/neworexisting');
});

Route::get("api/patients/search/{term?}", "PatientsController@api_search");
Route::post("api/patients/update", "PatientsController@update");
Route::post("api/patients/create", "PatientsController@create");

Route::get("visits/create/{patient_id?}", "VisitsController@create");
Route::post("visits/store/{patient_id?}", array("as"=>"visits.store", "uses"=>"VisitsController@store"));