<?php

class Patient extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

    public function scopeLike($query, $what){
        return $query
            ->where('surname', 'LIKE', "%$what%")
            ->orwhere('AMKA', 'LIKE', "%$what%")
            ;
    }
}
