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

        $activiti = \eHIF\ActivitiEndpoint::instance();

        $process = $activiti->processes->get($id);
        $user = $activiti->users->current();

        $instance = $process->startInstance(array("patient"=>"1112"));
        $firstTask =  $instance->tasks[0];
       // $firstTask->assign($user);
        return Redirect::to(URL::route("bpmn.next", array("id"=>$firstTask->id)));
        //start the process instance and get its id
        //store the id
        //next
    }


    protected function next(){
        $task_id = Input::get("id");
        $activiti = \eHIF\ActivitiEndpoint::instance();
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

        try{
            $activiti = \eHIF\ActivitiEndpoint::instance();
            $task = $activiti->tasks->get($task_id);

            $user = $activiti->users->current();

            $task->assign($user);

            $variables = $task->getprocessInstance()->getVariables();

            if(isset($variables["patient_id"])){
                $patient = Patient::find($variables["patient_id"]);

            }
            else $patient = null;

            return View::make("processes.bpmn.generic")->with("form", $task->form)->with("task", $task)->with("variables", $variables)->with("patient", $patient);
        }
        catch(GuzzleHttp\Exception\ServerException $ex){
            if($ex->getCode()==404){
                //throw $ex;
                return View::make("processes.end"); //Redirect::to(URL::to("processes/list"));
            }
        }
        catch(\GuzzleHttp\Exception\ClientException $ex){
            return Redirect::to(URL::to("processes/list"));
        }
        return Redirect::to(URL::to("processes/list"));
    }

    public function complete($task_id){
        $activiti = \eHIF\ActivitiEndpoint::instance();

        $task = $activiti->tasks->get($task_id);

        $processInstanceId = $task->processInstanceId;

        try {
            $processInstance = $activiti->processInstances->get($processInstanceId);
            $variables = $processInstance->variables;


            $superprocesses = $processInstance->getSuperprocessInstances();
            //dd($superprocesses);

            $task->complete(Input::all());

            $tasks = $processInstance->gettasks();

            if (empty($tasks)) {
                $subprocesses = $processInstance->getSubprocessInstances();
                if (empty($subprocesses)) {
                    //superprocess???


                    if(empty($superprocesses)){

                        return Redirect::to(URL::to("processes/list"));
                    }
                    else{

                        //manually pass all variables
                        foreach($superprocesses as $superprocess){
                            $superprocess->setVariables($variables);
                        }

                        $tasks = $superprocesses[0]->getTasks();
                        $task = $tasks[0];
                        return Redirect::to(URL::action("bpmn.next", array("id" => $task->id)));
                    }
                }
                else{

                    $variables = $processInstance->variables;

                    //manually pass all variables
                    foreach($subprocesses as $subprocess){
                        $subprocess->setVariables($variables);
                    }

                    $tasks = $subprocesses[0]->getTasks();
                    $task = $tasks[0];
                    return Redirect::to(URL::action("bpmn.next", array("id" => $task->id)));
                }
            }

            $next_task = $tasks[0];

            return Redirect::to(URL::route("bpmn.next", array("id" => $next_task->id)));
        }

        catch(GuzzleHttp\Exception\ClientException $ex){
            if($ex->getCode()==404){
                //throw $ex;
                return View::make("processes.end"); //Redirect::to(URL::to("processes/list"));
            }
        }
        catch(\GuzzleHttp\Exception\ServerException $ex){
            echo($ex->getRequest()->getBody());
            echo($ex->getResponse()->getBody());
            die;
        }

        return Redirect::to(URL::to("processes/list"));

    }


    public function deleteProcessInstance($processInstanceId){
        try{
            $activiti = \eHIF\ActivitiEndpoint::instance();

            $processInstance = $activiti->processInstances->get($processInstanceId);

            $processInstance->deleteProcessInstance();


            return Redirect::to(URL::to("processes/list"));
        }
        catch( \GuzzleHttp\Exception\ClientException $ex ){

            return View::make("processes.no-processes")->with("no_processes", true);
        }
    }

}