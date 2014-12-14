<?php
use eHIF\Activiti;
use eHIF\Process;
class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
       $activiti =  new Activiti(
		   Config::get('activiti.endpoint'),
		   Config::get('activiti.username'),
		   Config::get('activiti.password'));
        $processes = $activiti->processes->get();


        if(Auth::user()==null){
           return Redirect::to(URL::to('users/login'));
        }

		return View::make('hello');
	}

}
