<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 4/10/2014
 * Time: 3:59 μμ

 */

class Prescription extends Eloquent {

    public $fillable = array( "comments", "session_id", "patient_id", "dosage", "substance");



    public function doctor(){
        return $this->belongsTo("User","doctor_id");
    }
} 