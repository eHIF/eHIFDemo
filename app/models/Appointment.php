<?php

class Appointment extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'when' => 'required',
		'patient_id' => 'required',
		'context' => 'required',
		'doctor_id' => 'required',
		'scheduler_id' => 'required'
	);
}
