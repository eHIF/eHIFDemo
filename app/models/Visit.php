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
        return $this->belongsTo("VisitClassification", "taxinomisi_peristatikou");
    }

    public function receptionUser(){
        return $this->belongsTo("User", "reception_user_id");
    }


    public function visit_status(){
        return $this->belongsTo("VisitStatus");
    }


    public function close(){
        $this->visit_status()->associate(VisitStatus::where("name","complete" )->first());
        $this->save();
    }

    public function startSession(){

        $medicalSession = MedicalSession::create([]);

        $medicalSession->visit()->associate($this);
        $this->visit_status()->associate(VisitStatus::where("name","session" )->first());

        $medicalSession->save();
        $this->save();


    }


} 