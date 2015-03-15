<?php

class Patient extends Eloquent {
	protected $guarded = array();

    public $fillable = array("onomatepwnimo", "patronimo", "amka", "town", "etosgennisis", "phone", "mobile", "zip", "nationality_id", "gender_id");

	public static $rules = array();

    public function scopeLike($query, $what){
        
        return $query
            ->where('onomatepwnimo', 'LIKE', "%$what%")
            ->orwhere('AMKA', 'LIKE', "%$what%")
            ;

    }

    public function visits(){
        return $this->hasMany("Visit");
    }

    public function sessions(){
        return $this->hasMany("MedicalSession");
    }
}
