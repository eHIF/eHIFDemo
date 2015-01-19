<?php

/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 28/10/2014
 * Time: 2:38 μμ

 */

class D1Controller extends BpmnController{



    public function patientInput( $task_id){

        $activiti = \eHIF\ActivitiEndpoint::instance();
        $task = $activiti->tasks->get($task_id);
        $user = $activiti->users->current();


        $task->assign($user);

        $config =  Config::get("activiti.versions");

        return View::make("processes.bpmn.patient_input")->with("form", $task->form)->with("task", $task)->
        with("config", Config::get('activiti.versions'))->with("process", $config["D1_1"])
            ->with("taskName","usertask5")->with("taskId",$task_id);
    }

    public function patientInput_complete($task_id){


        if(Input::has("amka")){

            $patient = Patient::where("amka", Input::get("amka"))->get();

            if($patient->isEmpty()){
                $patient = Patient::create(Input::except(["time_examination","date_examination"]));
            }
            else{
                $patient=$patient->first();
                $patient->update(Input::except(["time_examination","date_examination"]));
            }

            $when  =date('Y-m-d H:i:s',strtotime(Input::get("time_examination")." ".Input::get("date_examination")));

            $patient_id = $patient->id;

            $reception_user_id = Auth::user()->id;

            $visit_status_id = VisitStatus::where("name","pending")->first()->id;

            $visit = Visit::create(array(
                "when"=>$when,
                "patient_id"=>$patient_id,
                "reception_user_id"=>$reception_user_id,
                "visit_status_id"=>$visit_status_id,
            ));


            $activiti = \eHIF\ActivitiEndpoint::instance();
            $task = $activiti->tasks->get($task_id);
            $processInstanceId = $task->processInstanceId;
            $processInstance = $activiti->processInstances->get($processInstanceId);

            $variables = ["visit_id"=>$visit->id];

            $processInstance->setVariables($variables);


            return parent::complete($task_id);
        }

        else{

            return self::patientInput($task_id);
        }



    }


    public function escortInput( $task_id){

        $activiti = \eHIF\ActivitiEndpoint::instance();
        $task = $activiti->tasks->get($task_id);
        $user = $activiti->users->current();


        $task->assign($user);

        $config =  Config::get("activiti.versions");

        return View::make("processes.bpmn.patient_input")->with("form", $task->form)->with("task", $task)->
        with("config", Config::get('activiti.versions'))->with("process", $config["D1_1"])
            ->with("taskName","usertask5")->with("taskId",$task_id);
    }

    public function escortInput_complete($task_id){


        if(Input::has("amka")){

            $patient = Patient::where("amka", Input::get("amka"))->get();

            if($patient->isEmpty()){
                $patient = Patient::create(Input::except(["time_examination","date_examination"]));
            }
            else{
                $patient=$patient->first();
                $patient->update(Input::except(["time_examination","date_examination"]));
            }

            $when  =date('Y-m-d H:i:s',strtotime(Input::get("time_examination")." ".Input::get("date_examination")));

            $patient_id = $patient->id;

            $reception_user_id = Auth::user()->id;

            $visit_status_id = VisitStatus::where("name","pending")->first()->id;

            $visit = Visit::create(array(
                "when"=>$when,
                "patient_id"=>$patient_id,
                "reception_user_id"=>$reception_user_id,
                "visit_status_id"=>$visit_status_id,
            ));


            $activiti = \eHIF\ActivitiEndpoint::instance();
            $task = $activiti->tasks->get($task_id);
            $processInstanceId = $task->processInstanceId;
            $processInstance = $activiti->processInstances->get($processInstanceId);

            $variables = ["visit_id"=>$visit->id];

            $processInstance->setVariables($variables);





            return parent::complete($task_id);
        }

        else{

            return self::patientInput($task_id);
        }



    }

}