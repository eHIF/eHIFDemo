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
        "D1_6" => array(
            "usertask3"=>array("action"=>"D6Controller@eopyyExams"),
            "usertask5"=>array("action"=>"D6Controller@internalExams"),
        ),
        "D1_9" => array(
            "usertask1"=>array("action"=>"D9Controller@patientHospitalize"),
        ),
        "D1_10" => array(
            "usertask7"=>array("action"=>"D10Controller@patientLeave"),
        ),




    ),

    "versions" => array(
        "D1_1" => "D1_1:1:7504",
        "D1_2" => "D1_2:1:7509",
        "D1_3" => "D1_3:1:7513",
        "D1_4" => "D1_4:1:7517",
        "D1_5" => "D1_5:1:7525",
        "D1_6" => "D1_6:1:7705",
        "D1_9" => "D1_9:1:7541",
        "D1_10" => "D1_10:1:7545",
    ),


    "long"=>array(
        ""
    ),

);