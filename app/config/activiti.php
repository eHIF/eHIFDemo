<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 5/10/2014
 * Time: 4:17 μμ

 */

return  array(
    "endpoint"=>"http://ws307.math.auth.gr:8080/activiti-rest/service/",
    "username"=>"kermit",
    "password"=>"kermit",


    "mappings" => array(

        "D1_1:1:28689" => array(
            "usertask5"=>array("action"=>"D1Controller@patientInput")
        ),



    ),

    "versions" => array(
        "D1_1" => "D1_1:1:28689"
    ),

);