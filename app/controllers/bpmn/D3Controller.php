<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 14/12/2014
 * Time: 9:26 μμ

 */




class D3Controller  extends BpmnController{

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
        return parent::complete($task_id);

    }

}