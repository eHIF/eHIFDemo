<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 5/10/2014
 * Time: 3:52 μμ

 */

namespace eHIF\events\handlers;


use eHIF\events\BaseHandler;

class PatientVisitHandler extends BaseHandler {
    public function onTest($event)
    {

        $activiti = self::$activiti;

        $processes = $activiti->processes->get();
        $users = $activiti->users->get();
        $tasks = $activiti->tasks->get();
        // dd($tasks);
    }
} 