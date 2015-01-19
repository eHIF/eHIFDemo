<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 11/1/2015
 * Time: 4:45 μμ

 */



class D9Controller extends BpmnController {

    public function patientHospitalize($task_id){
        $taskName = "usertask1";
        $versions =  Config::get('activiti.versions');
        $processName = $versions["D1_9"];
        $submit = URL::route("$processName.$taskName.complete",array("task_id"=>$task_id));

        $view = parent::task($processName,$taskName,$task_id)->with("submit", $submit);

        return $view;
    }

    public function patientHospitalize_complete($task_id){

        $activiti = \eHIF\ActivitiEndpoint::instance();
        $task = $activiti->tasks->get($task_id);
        $processInstance = $task->processInstance;


        $session_id = $processInstance->getVariable("session_id");

        $session = MedicalSession::find($session_id);

        $patient = $session->patient;

        $hospitalization = Hospitalization::create(
            [
                "medical_session_id"=>$session_id,
                "patient_id"=>$patient->id
            ]
        );





        return parent::complete($task_id);

    }


}