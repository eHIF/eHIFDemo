<?php
use eHIF\events\BaseHandler;

/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 28/10/2014
 * Time: 2:38 μμ

 */

class D1Controller extends BaseController{

    public function index($task_id){
        $activiti = BaseHandler::$activiti;
        $task = $activiti->tasks->get($task_id);
        dd($task->form);
    }
}