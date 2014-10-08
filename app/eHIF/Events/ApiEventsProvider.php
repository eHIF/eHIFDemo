<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 5/10/2014
 * Time: 2:12 πμ

 */

namespace eHIF\Events;

use  Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Event;
use eHIF\Activiti;
class ApiEventsProvider extends  ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app->events->subscribe(new ApiEventsHandler);
    }

}