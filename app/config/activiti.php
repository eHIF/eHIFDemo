<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 5/10/2014
 * Time: 4:17 μμ

 */

return  array(
    "endpoint"=>"http://147.102.33.146:8080/activiti-rest/service/",
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
        "D1_3" => array(
            "usertask3"=>array("action"=>"D3Controller@medicalFindings"),
            "usertask4"=>array("action"=>"D3Controller@comments"),
            "usertask2"=>array("action"=>"D3Controller@patientInput")
        ),





    ),

    "versions" => array(
        "D1_1" => "D1_1:1:61212",
        "D1_2" => "D1_2:1:61217",
        "D1_3" => "D1_3:1:48627",
    ),

);