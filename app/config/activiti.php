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
        "D1_5" => array(
            "usertask7"=>array("action"=>"D5Controller@patientLeave"),
        ),
        "D1_4" => array(
            "usertask8"=>array("action"=>"D4Controller@decide"),
        ),
        "D1_9" => array(
            "usertask1"=>array("action"=>"D9Controller@patientHospitalize"),
        ),
        "D1_10" => array(
            "usertask7"=>array("action"=>"D10Controller@patientLeave"),
        ),




    ),

    "versions" => array(
        "D1_1" => "D1_1:1:107",
        "D1_2" => "D1_2:1:112",
        "D1_3" => "D1_3:1:116",
        "D1_4" => "D1_4:1:120",
        "D1_5" => "D1_5:1:124",
        "D1_9" => "D1_9:1:140",
        "D1_10" => "D1_10:1:144",
    ),

);