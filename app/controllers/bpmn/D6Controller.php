<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 11/1/2015
 * Time: 4:45 μμ

 */



class D6Controller  extends BpmnController {

    public function eopyyExams($task_id){

        $taskName = "usertask3";
        $versions =  Config::get('activiti.versions');
        $processName = $versions["D1_6"];
        $submit = URL::route("$processName.$taskName.complete",array("task_id"=>$task_id));

        $view = parent::task($processName,$taskName,$task_id)->with("submit", $submit);

        return $view;
    }

    public function eopyyExams_complete($task_id){

        $activiti = \eHIF\ActivitiEndpoint::instance();
        $task = $activiti->tasks->get($task_id);
        $processInstance = $task->processInstance;


        $session_id = $processInstance->getVariable("session_id");

        $session = MedicalSession::find($session_id);

        $referral = Referral::create(
            [
                "referral_type_id"=>1,
                "comments"=>Input::get("issue"),
                "session_id"=>$session->id,
                "patient_id"=>$session->patient_id
            ]
        );

        $referral->save();


        return parent::complete($task_id);

    }
    public function internalExams($task_id){

        $taskName = "usertask5";
        $versions =  Config::get('activiti.versions');
        $processName = $versions["D1_6"];
        $submit = URL::route("$processName.$taskName.complete",array("task_id"=>$task_id));

        $view = parent::task($processName,$taskName,$task_id)->with("submit", $submit);

        return $view;
    }

    public function internalExams_complete($task_id){

        $activiti = \eHIF\ActivitiEndpoint::instance();
        $task = $activiti->tasks->get($task_id);
        $processInstance = $task->processInstance;


        $session_id = $processInstance->getVariable("session_id");

        $session = MedicalSession::find($session_id);

        $referral = Referral::create(
            [
                "referral_type_id"=>1,
                "comments"=>Input::get("issue"),
                "session_id"=>$session->id,
                "patient_id"=>$session->patient_id
            ]
        );

        $referral->save();


        return parent::complete($task_id);

    }


}