<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 19/1/2015
 * Time: 1:43 πμ

 */


class Hospitalization extends Eloquent {

    public $fillable = array(
        "medical_session_id",
        "patient_id"
    );

    public function patient(){

        return $this->belongsTo("Patient");
    }

    public function medical_session(){
        return $this->belongsTo("MedicalSession");

    }
}