<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 5/10/2014
 * Time: 3:53 μμ

 */

namespace eHIF\events;

use  Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use eHIF\WrapperPHPServiceProvider;
use eHIF\Activiti;

class BaseHandler {
    public static $activiti;

    public static function init(){
        BaseHandler::$activiti =   new Activiti(
            Config::get('activiti.endpoint'),
            Config::get('activiti.username'),
            Config::get('activiti.password'));


    }
} 