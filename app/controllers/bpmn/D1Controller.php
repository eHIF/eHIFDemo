<?php
use eHIF\events\BaseHandler;

/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 28/10/2014
 * Time: 2:38 μμ

 */

class D1Controller extends BaseController{

    public function index($task_id){
        $activiti = BaseHandler::$activiti;
        $task = $activiti->tasks->get($task_id);
        dd($task->form);
    }



    public function patientInput( $task_id){

        $activiti = BaseHandler::$activiti;
        $task = $activiti->tasks->get($task_id);

        $config =  Config::get("activiti.versions");

        return View::make("processes.bpmn.patient_input")->with("form", $task->form)->with("task", $task)->
        with("config", Config::get('activiti.versions'))->with("process", $config["D1_1"])
            ->with("taskName","usertask5")->with("taskId",$task_id);
    }

    public function patientInput_complete(){
        echo 'lol';
        die;

    }

}