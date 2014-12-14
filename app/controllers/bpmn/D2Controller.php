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
        return parent::complete($task_id);

    }

}