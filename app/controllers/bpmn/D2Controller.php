<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 14/12/2014
 * Time: 9:26 μμ

 */




class D2Controller  extends BpmnController{

    public function incidentClassification($task_id){
        $taskName = "usertask1";
        $versions =  Config::get('activiti.versions');
        $processName = $versions["D1_2"];
        $submit = URL::route("$processName.$taskName.complete",array("task_id"=>$task_id));

        $view = parent::task($processName,$taskName,$task_id)->with("submit", $submit);

        return $view;
    }

    public function incidentClassification_complete($task_id){


        $vc = VisitClassification::where("alias", Input::get("taxinomisi_peristatikou"))->first();

        $activiti = \eHIF\ActivitiEndpoint::instance();
        $task = $activiti->tasks->get($task_id);
        $processInstanceId = $task->processInstanceId;
        $processInstance = $activiti->processInstances->get($processInstanceId);


        $visit_id = $processInstance->getVariable("visit_id");

        $visit =  Visit::find($visit_id);

        $visit->visit_classification()->associate($vc);
        $visit->save();

        //dd($visit_id);



        return parent::complete($task_id);

    }

}