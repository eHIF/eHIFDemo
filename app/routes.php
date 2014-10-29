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
Route::post("api/patients/update", "PatientsController@api_update");
Route::post("api/patients/create", "PatientsController@api_create");
Route::get("api/patients/index", "PatientsController@api_index");

Route::resource('patients', 'PatientsController');

Route::get("visits/create/{patient_id?}", "VisitsController@create");
Route::get("visits", "VisitsController@index");
Route::post("visits/store/{patient_id?}", array("as"=>"visits.store", "uses"=>"VisitsController@store"));

Route::resource('sessions', 'SessionsController');


Route::get('api/sessions/referrals', 'ReferralsController@api_index');
Route::post('api/sessions/referrals', 'ReferralsController@api_store');
Route::delete('api/sessions/referrals', 'ReferralsController@api_delete');
Route::get('api/sessions/referrals/types', 'ReferralTypesController@api_index');

Route::post('sessions/close',array("as"=>"sessions.close", "uses"=>"SessionsController@close"));


Route::resource('appointments', 'AppointmentsController');


Route::get('processes/list',"ProcessesController@enlist");

Route::get("bpmn/start", array("as"=>'bpmn.start', "uses"=>"BpmnController@start"));
Route::get("bpmn/next", array("as"=>'bpmn.next', "uses"=>"BpmnController@next"));



$mappings = Config::get('activiti.mappings');

foreach ($mappings as $process=>$tasks) {
    foreach ($tasks as $task=>$details) {
        Route::get("bpmn/runtime/$process/$task/{task_id}/", array(
            "as"=>"$process.$task",
            "uses"=>$details["action"],
        ));
    }

}

Route::get("bpmn/runtime/{process}/{task_key}/{task_id}", array(
    "as"=>"process.task",
    "uses"=>"BpmnController@task",
));
Route::post("bpmn/runtime/{task_id}", array(
    "as"=>"process.task.complete",
    "uses"=>"BpmnController@complete",
));
