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



    public function subscribe($events)
    {
        BaseHandler::init();
        $events->listen('api.test', 'eHIF\Events\Handlers\PatientVisitHandler@onTest');
    }

} 