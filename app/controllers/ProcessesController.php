<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 19/10/2014
 * Time: 1:20 πμ

 */
use \eHIF\events\BaseHandler;
class ProcessesController extends BaseController{

    public function enlist(){
        $activiti = BaseHandler::$activiti;

        $processes = $activiti->processes->get();
        $user = $activiti->users->current();

        $tasks = $user->tasks;
        foreach($tasks as $task)
var_dump($task->variables);
        return View::make("processes.list")
            ->with("processes",$processes)
            ->with("tasks", $tasks);
    }

}