<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 29/9/2014
 * Time: 12:40 μμ

 */

class Visit extends Eloquent{

    public $fillable = array("symptoms", "diagnosis", "when", "visit_classification_id",
        "patient_id",
        "reception_user_id",
        "visit_status_id");

    public function patient(){
        return $this->belongsTo("Patient");
    }


    public function visit_classification(){
        return $this->belongsTo("VisitClassification");
    }

    public function receptionUser(){
        return $this->belongsTo("User", "reception_user_id");
    }


    public function visit_status(){
        return $this->belongsTo("VisitStatus");
    }


} 