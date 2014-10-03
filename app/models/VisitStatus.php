<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 4/10/2014
 * Time: 12:43 πμ

 */

class VisitStatus extends Eloquent {


    public static  function status($name){
        return self::where("name","=", $name)->first();
    }
} 