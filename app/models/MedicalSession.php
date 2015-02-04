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

    public function close(){
        $this->closed=true;
        $this->visit->visit_status()->associate(VisitStatus::where("name","complete")->first());
        $this->visit->save();
        $this->save();
    }

    public function diseases(){
        return $this->belongsToMany("Disease")->withTimestamps();
    }
}
