<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 5/10/2014
 * Time: 2:28 πμ

 */

namespace eHIF\Events;
use eHIF\WrapperPHPServiceProvider;
use eHIF\Activiti;
class ApiEventsHandler {
    /**
     * Handle user login events.
     */
    public function onTest($event)
    {




        $activiti = new Activiti("http://localhost:8080/activiti-rest/service/", "kermit", "kermit");
        $processes = $activiti->processes->get();
        $users = $activiti->users->get();
        $tasks = $activiti->tasks->get();
       // dd($tasks);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen('api.test', 'eHIF\Events\ApiEventsHandler@onTest');
    }

} 