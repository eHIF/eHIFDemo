<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 4/10/2014
 * Time: 3:59 μμ

 */

class Therapeutic extends Eloquent {

    public $fillable = array( "comments", "session_id", "patient_id");

    public function  therapeutic_type(){
        return $this->belongsTo("TherapeuticsType", "therapeutics_type_id");
    }


    public function doctor(){
        return $this->belongsTo("User","doctor_id");
    }
} 