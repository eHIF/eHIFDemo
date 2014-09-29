<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 28/9/2014
 * Time: 3:54 μμ

 */

class PatientsController extends Controller {

    public function api_search($term = ""){
        $patients = Patient::like($term)->get();

        return $patients;
    }
} 