<?php
/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 29/9/2014
 * Time: 12:42 μμ

 */

class VisitsController extends Controller{

    public function store(){
        $visit = Visit::create(Input::except('_token'));

        $patient = Patient::find(Input::get("patient_id"));
        $visit->patient()->associate($patient);
        $user =  Auth::user();
        $visit->receptionUser()->associate($user);

        $visit->save();

        Redirect::to(action("visit.classify"));
    }


    public function create($patient_id){
        $patient = Patient::find($patient_id);
        return View::make('visits.create')->with("patient", $patient);
    }

    public function index(){
        $visits = Visit::with("patient")->get();

        return View::make("visits.index")->with("visits", $visits);
    }

} 