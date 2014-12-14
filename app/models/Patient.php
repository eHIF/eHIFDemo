<?php

class Patient extends Eloquent {
	protected $guarded = array();

    public $fillable = array("onomatepwnimo", "patronimo", "amka", "town", "etosgennisis");

	public static $rules = array();

    public function scopeLike($query, $what){
        return $query
            ->where('surname', 'LIKE', "%$what%")
            ->orwhere('AMKA', 'LIKE', "%$what%")
            ;
    }

    public function visits(){
        return $this->hasMany("Visit");
    }
}
