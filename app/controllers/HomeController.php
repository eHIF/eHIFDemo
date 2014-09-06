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
        $activiti = new Activiti("http://ws307.math.auth.gr:8080/activiti-rest/service/", "kermit", "kermit");
        $processes = $activiti->processes->get();


        var_dump($processes[0]->processinstances[0]->startUserId);


		return View::make('hello');
	}

}
