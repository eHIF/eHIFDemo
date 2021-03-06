<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 14/12/2014
 * Time: 9:26 μμ

 */

class D3Controller  extends BpmnController{

    public function comments($task_id){
        $taskName = "usertask4";
        $versions =  Config::get('activiti.versions');
        $processName = $versions["D1_3"];
        $submit = URL::route("$processName.$taskName.complete",array("task_id"=>$task_id));

        $view = parent::task($processName,$taskName,$task_id)->with("submit", $submit);

        return $view;
    }

    public function comments_complete($task_id){

        $activiti = \eHIF\ActivitiEndpoint::instance();
        $task = $activiti->tasks->get($task_id);
        $processInstance = $task->processInstance;


        $session_id = $processInstance->getVariable("session_id");

        $session = MedicalSession::find($session_id);

        $comments = Input::get("exetaseis_sxolia");

        $session->diagnosis = $comments;

        $session->save();


        return parent::complete($task_id);

    }


    public function medicalFindings($task_id){
        $taskName = "usertask3";
        $activiti = \eHIF\ActivitiEndpoint::instance();
        $config =  Config::get("activiti.versions");
        $versions =  Config::get('activiti.versions');
        $processName = $versions["D1_3"];
        $task = $activiti->tasks->get($task_id);

        return View::make("processes.bpmn.medical_findings")->with("form", $task->form)->with("task", $task)->
        with("config", Config::get('activiti.versions'))->with("process", $config["D1_3"])
            ->with("taskName","usertask3")->with("taskId",$task_id);


    }

    public function medicalFindings_complete($task_id){

        $findings = Input::get("eyrimata");

        $findings = explode(' ',trim ($findings));

        $medicalFindings = array();

        foreach($findings as $finding){
            $disease = Disease::where("code", $finding)->first();
            $medicalFindings[]=$disease;

        }

        $activiti = \eHIF\ActivitiEndpoint::instance();
        $task = $activiti->tasks->get($task_id);
        $processInstance = $task->processInstance;


        $session_id = $processInstance->getVariable("session_id");

        $session = MedicalSession::find($session_id);

        foreach ($medicalFindings as $medicalFinding) {

            $session->diseases()->save($medicalFinding);
        }




        return parent::complete($task_id);

    }

    public function patientInput( $task_id){

        $taskName = "usertask2";
        $versions =  Config::get('activiti.versions');
        $processName = $versions["D1_3"];
        $submit = URL::route("$processName.$taskName.complete",array("task_id"=>$task_id));

        $view = parent::task($processName,$taskName,$task_id)->with("submit", $submit);

        return $view;
    }

    public function patientInput_complete($task_id){
        //dd(Input::all());

        $activiti = \eHIF\ActivitiEndpoint::instance();
        $task = $activiti->tasks->get($task_id);
        $processInstanceId = $task->processInstanceId;
        $processInstance = $activiti->processInstances->get($processInstanceId);

        $variables= $processInstance->getVariables();




        if(Input::has("amka")){

            $patient = Patient::where("amka", Input::get("amka"))->get()->first();
            $patient->address = Input::get("dieythinsi");
            $patient->phone = Input::get("tilephono");

            $patient->save();


            $visit_id = $variables["visit_id"];


            $visit  = Visit::find($visit_id);

            if(!$visit==null && isset($variables["session_id"])){

                return parent::complete($task_id);


            }

            if(!$visit==null){
                $session = MedicalSession::create(array(
                    "visit_id"=>$visit->id,
                    "patient_id"=>$patient->id,
                    "doctor_id"=>Auth::user()->id,
                    "symptoms"=>$visit->symptoms

                ));



                $session->save();

                $visit->visit_status()->associate(VisitStatus::where("name","session")->first());

                $visit->save();

                $activiti = \eHIF\ActivitiEndpoint::instance();
                $task = $activiti->tasks->get($task_id);
                $processInstance = $task->processInstance;
                $processInstance->setVariable("session_id", $session->id);


                return parent::complete($task_id);



            }
            else{

                //create visit?
            }



        }

        else{

            return self::patientInput($task_id);
        }



    }



}