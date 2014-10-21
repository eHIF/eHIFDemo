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

    protected $mappings = array(
        "reception"=>array(
            "action"=>"reception",
            "entities"=>array(
                "patient"=>array("type"=>"Patient"),
                "session"=>array("type"=>"MedicalSession"),
            ),
        ),
    );

    public function start(){
        $id = Input::get("id");

        $activiti = BaseHandler::$activiti;

        $process = $activiti->processes->get($id);
        $user = $activiti->users->current();

        $instance = $process->startInstance(array("patient"=>"1112"));
        $instance->tasks[0]->assign($user);
        //start the process instance and get its id
        //store the id
        //next
    }


    protected function next(){
        Redirect::to(URL::action(""));
        //get current task of processInstance
        //get any variables
        ///show the correct view
        ///restrict the view's action to submit data, save data and then do the same
    }
}