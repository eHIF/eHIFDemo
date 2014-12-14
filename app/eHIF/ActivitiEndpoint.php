<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 14/12/2014
 * Time: 10:12 πμ

 */

namespace eHIF;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class ActivitiEndpoint {
    private static $activiti;

    public static function instance(){
        if(!isset(self::$activiti)){
            self::$activiti = new Activiti(
                Config::get('activiti.endpoint'),
                Auth::user()->activiti_username,
                Auth::user()->activiti_password
            );

            return self::$activiti;
        }

        else return self::$activiti;
    }

    public static function tasks(){
        $activiti = self::instance();

        $processes = $activiti->processes->get();
        $user = $activiti->users->current();

        $tasks = $user->tasks;

        return $tasks;

    }

}