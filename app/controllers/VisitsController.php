<?php

/**
 * Created by PhpStorm.
 * User: larjohns
 * Date: 29/9/2014
 * Time: 12:42 μμ

 */
class VisitsController extends Controller
{

    public function store()
    {
        $visit = Visit::create(Input::except('_token'));

        $patient = Patient::find(Input::get("patient_id"));
        $visit->patient()->associate($patient);
        $user = Auth::user();
        $visit->receptionUser()->associate($user);
        $visit->visit_status()->associate(VisitStatus::status("pending"));
        $visit->save();

        return Redirect::to(URL::to("visits"));
    }


    public function create($patient_id)
    {
        $patient = Patient::find($patient_id);
        return View::make('visits.create')->with("patient", $patient);
    }

    public function index()
    {

        return View::make("visits.index");
    }

    public function api_index()
    {

       // dd(Input::all());
        $query = Visit::with("visit_status")
            ->with("patient")
            ->join("patients", "visits.patient_id","=","patients.id")
            ->join("visit_statuses", "visits.visit_status_id","=","visit_statuses.id")
            ->select("visits.*");

        $count = $query->count();


        $search = Input::get("search")["value"];

        $searchQuery =$query->where("patients.amka", "LIKE", "%$search%")
                ->orWhere("patients.onomatepwnimo", "LIKE", "%$search%");



        $s_count = $searchQuery->count();

        $columns = Input::get("columns");
        foreach (Input::get("order",[]) as $order) {
            $column  = $columns[$order["column"]]["data"];

            $col_parts = explode(".",$column);

            if(count($col_parts)>1){
                $tableName = str_plural($col_parts[0]);
                $col_parts[0] = $tableName;
            }

            $column = implode(".", $col_parts);


            $searchQuery->orderBy($column, $order["dir"]);

            
        }


        $visits = $searchQuery
            ->offset(Input::get("start", 0))
            ->limit(Input::get("length", 10))
            ->get();


        //  dd(Input::all());

        return [
            "data" => $visits,
            "recordsTotal" => $count,
            "recordsFiltered" => $s_count,
            "draw" => Input::get("draw"),


        ];
    }

    public function close ($visit_id){

        Visit::find($visit_id)->close();



        return Redirect::to("visits");
    }

    public function startSession ($visit_id){

        $medicalSession =  Visit::find($visit_id)->startSession();



        return Redirect::to("visits");
    }
}