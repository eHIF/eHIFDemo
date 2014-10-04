<?php

class MedicalSession extends Eloquent {
	protected $guarded = array();

	public static $rules = array(

	);

    public function visit(){
        return $this->belongsTo("Visit");
    }

    public function patient(){
        return $this->belongsTo("Patient");
    }

    public function doctor(){
        return $this->belongsTo("User","doctor_id");
    }
}
