<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 4/10/2014
 * Time: 3:59 μμ

 */

class Referral extends Eloquent {

    public $fillable = array("referral_type_id", "comments", "session_id", "patient_id");

    public function  referral_type(){
        return $this->belongsTo("ReferralType");
    }

    public function doctor(){
        return $this->belongsTo("User","doctor_id");
    }
} 