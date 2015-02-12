<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 4/10/2014
 * Time: 4:07 μμ

 */

class PrescriptionsController extends BaseController {

    public function api_index(){

        $session_id = Input::get("session_id");

        $event = Event::fire('api.test','j');
        //dd($event);
        return Prescription::where("session_id",$session_id)->get();
    }

    public function api_store(){
        Prescription::create(Input::all());
        return self::api_index();
    }
    public function api_delete(){
        Prescription::destroy(Input::get('id'));

        return self::api_index();
    }
} 