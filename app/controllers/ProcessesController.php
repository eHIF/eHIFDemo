<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 19/10/2014
 * Time: 1:20 πμ

 */
use eHIF\ActivitiEndpoint;
use \eHIF\events\BaseHandler;
class ProcessesController extends BaseController{

    public function enlist(){

        try{
            $activiti = ActivitiEndpoint::instance();

            $processes = $activiti->processes->get();
            $user = $activiti->users->current();

            $tasks = $user->tasks;


            return View::make("processes.list")
                ->with("processes",$processes)
                ->with("no_processes", false)
                ->with("tasks", $tasks);
        }
        catch( \GuzzleHttp\Exception\ClientException $ex ){
            return View::make("processes.no-processes")->with("no_processes", true);
        }

    }

}