<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 5/10/2014
 * Time: 4:17 μμ

 */

return  array(
    "endpoint"=>"http://ws307.math.auth.gr:8080/activiti-rest/service/",
    "username"=>"gonzo",
    "password"=>"gonzo",


    "mappings" => array(

        "D1_1" => array(
            "usertask5"=>array("action"=>"D1Controller@patientInput"),
            "usertask4"=>array("action"=>"D1Controller@escortInput")
        ),
        "D1_2" => array(
            "usertask1"=>array("action"=>"D2Controller@incidentClassification"),
        ),



    ),

    "versions" => array(
        "D1_1" => "D1_1:1:28799",
        "D1_2" => "D1_2:1:38440",
    ),

);