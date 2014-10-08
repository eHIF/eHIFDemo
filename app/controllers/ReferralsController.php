<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 4/10/2014
 * Time: 4:07 μμ

 */

class ReferralsController extends BaseController {

    public function api_index(){

        $session_id = Input::get("session_id");

        $event = Event::fire('api.test','j');
        dd($event);
        return Referral::with("referral_type")->where("session_id",$session_id)->get();
    }

    public function api_store(){
        Referral::create(Input::all());
        return self::api_index();
    }
    public function api_delete(){
        Referral::destroy(Input::get('id'));

        return self::api_index();
    }
} 