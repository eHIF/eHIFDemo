<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 17/10/2014
 * Time: 11:20 μμ

 */
use \eHIF\events\BaseHandler;

class BpmnController extends BaseController {


    protected $processInstanceId = 0;


    public function start(){
        $id = Input::get("id");

        $activiti = BaseHandler::$activiti;

        $process = $activiti->processes->get($id);
        $user = $activiti->users->current();

        $instance = $process->startInstance(array("patient"=>"1112"));
        $firstTask =  $instance->tasks[0];
        $firstTask->assign($user);
        return Redirect::to(URL::route("bpmn.next", array("id"=>$firstTask->id)));
        //start the process instance and get its id
        //store the id
        //next
    }


    protected function next(){
        $task_id = Input::get("id");
        $activiti = BaseHandler::$activiti;
        $task = $activiti->tasks->get($task_id);

        $process_id = $task->processDefinitionId;
        $task_key = $task->taskDefinitionKey;

       // dd(URL::action("$process_id.$task_key",$task_id));

       // dd($task->processDefinitionId);
        if(Route::has("$process_id.$task_key"))
            return Redirect::to(URL::route("$process_id.$task_key", $task_id));
        else
            return Redirect::to(URL::route("process.task", array($process_id, $task_key, $task_id)));
        //get current task of processInstance
        //get any variables
        ///show the correct view
        ///restrict the view's action to submit data, save data and then do the same
    }


    public function task($process_id, $task_key, $task_id){

        $activiti = BaseHandler::$activiti;
        $task = $activiti->tasks->get($task_id);

        return View::make("processes.bpmn.generic")->with("form", $task->form)->with("task", $task);
    }

    public function complete($task_id){
        $activiti = BaseHandler::$activiti;

        $task = $activiti->tasks->get($task_id);

        $processInstanceId = $task->processInstanceId;



        $task->complete(Input::all());

        try{
            $processInstance = $activiti->processInstances->get($processInstanceId);
            $tasks = $processInstance->gettasks();

            //dd($tasks);

            $next_task = $tasks[0];

            return Redirect::to(URL::route("bpmn.next", array("id"=>$next_task->id)));
        }
        catch(GuzzleHttp\Exception\ClientException $ex){
            if($ex->getCode()==404){
                return Redirect::to(URL::to("processes/list"));
            }

        }



    }
}