<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 11/1/2015
 * Time: 4:45 μμ

 */



class D4Controller extends BpmnController {

    public function decide($task_id){

        $taskName = "usertask8";
        $versions =  Config::get('activiti.versions');
        $processName = $versions["D1_4"];
        $submit = URL::route("$processName.$taskName.complete",array("task_id"=>$task_id));

        $view = parent::task($processName,$taskName,$task_id)->with("submit", $submit);

        return $view;
    }


    public function decide_complete($task_id){

        $activiti = \eHIF\ActivitiEndpoint::instance();
        $task = $activiti->tasks->get($task_id);
        $processInstanceId = $task->processInstanceId;
        $processInstance = $activiti->processInstances->get($processInstanceId);

        $variables= $processInstance->getVariables();

        $visit_id = $variables["visit_id"];

        $visit  = Visit::find($visit_id);
        $patient = Patient::find($variables["patient_id"]);

        if(!$visit==null){
            $session = MedicalSession::create(array(
                "visit_id"=>$visit_id,
                "patient_id"=>$patient->id,
                "doctor_id"=>Auth::user()->id,

            ));



            $session->save();
            $processInstance->setVariable("session_id", $session->id);
        }



        return parent::complete($task_id);
    }

}