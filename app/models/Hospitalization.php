<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 19/1/2015
 * Time: 1:43 πμ

 */


class Hospitalization extends Eloquent {

    public $fillable = array(
        "session_id",
        "patient_id",
        "doctor_id",
        "duration",
        "comments"
    );

    public function patient(){

        return $this->belongsTo("Patient");
    }

    public function medical_session(){
        return $this->belongsTo("MedicalSession", "session_id");

    }


}