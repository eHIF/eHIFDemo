<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 11/1/2015
 * Time: 4:45 μμ

 */



class D5Controller extends BpmnController {

    public function patientLeave($task_id){
        $taskName = "usertask7";
        $versions =  Config::get('activiti.versions');
        $processName = $versions["D1_5"];
        $submit = URL::route("$processName.$taskName.complete",array("task_id"=>$task_id));

        $view = parent::task($processName,$taskName,$task_id)->with("submit", $submit);

        return $view;
    }

    public function patientLeave_complete($task_id){

        $activiti = \eHIF\ActivitiEndpoint::instance();
        $task = $activiti->tasks->get($task_id);
        $processInstance = $task->processInstance;


        $session_id = $processInstance->getVariable("session_id");

        $session = MedicalSession::find($session_id);

        $session->closed=1;

        $session->save();


        $session->visit->visit_status_id = VisitStatus::where("name","complete")->first()->id;

        $session->visit->save();





        return parent::complete($task_id);

    }


}