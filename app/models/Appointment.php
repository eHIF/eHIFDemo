<?php

class Appointment extends Eloquent {
	protected $guarded = array();


	public $fillable = ["patient_id", "when", "context", "doctor_id", "scheduler_id"];

	public static $rules = array(
		'when' => 'required',
		'patient_id' => 'required',
		'doctor_id' => 'required',
		'scheduler_id' => 'required'
	);

	public function patient(){
		return $this->belongsTo("Patient");
	}
	public function doctor(){
		return $this->belongsTo("User");
	}
	public function scheduler(){
		return $this->belongsTo("User");
	}
}
