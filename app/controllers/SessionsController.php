<?php

class SessionsController extends BaseController {

	/**
	 * Session Repository
	 *
	 * @var Session
	 */
	protected $session;

	public function __construct(MedicalSession $session)
	{
		$this->session = $session;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		return View::make('sessions.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

        $visit = Visit::find(Input::get("visit"));
		return View::make('sessions.create')->with("patient",$visit->patient)
            ->with("visit", $visit);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, MedicalSession::$rules);

        $visit = Visit::find(Input::get("visit_id"));
        $patient = Patient::find(Input::get("patient_id"));



		if ($validation->passes())
		{
			$session = $this->session->create($input);

            $session->visit()->associate($visit);
            $session->patient()->associate($patient);
            $session->doctor()->associate(Auth::user());
            $session->save();

			return Redirect::route('sessions.edit',array("id"=> $session->id));
		}

		return Redirect::route('sessions.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$session = $this->session->findOrFail($id);

		return View::make('sessions.show', compact('session'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$session = $this->session->find($id);

		if (is_null($session))
		{
			return Redirect::route('sessions.index');
		}

		return View::make('sessions.edit', compact('session'))->with("patient",$session->patient);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, MedicalSession::$rules);



		if ($validation->passes())
		{
			$session = $this->session->find($id);
			$session->update($input);

			return Redirect::route('sessions.index', $id);
		}

		return Redirect::route('sessions.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}


    public function api_index()
    {

        // dd(Input::all());
        $query = MedicalSession
            ::with("patient")
            ->with("visit")
            ->with("visit.visit_status")
            ->join("patients", "medical_sessions.patient_id","=","patients.id")
            ->join("users", "medical_sessions.doctor_id","=","users.id")
            ->join("visits", "medical_sessions.visit_id","=","visits.id")
            ->join("visit_statuses", "visits.visit_status_id","=","visit_statuses.id")

            ->select(["medical_sessions.*","users.name as doctor"]);

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
                for($i=0;$i<count($col_parts)-1;$i++){
                    $tableName = str_plural($col_parts[$i]);
                    $col_parts[$i] = $tableName;
                }


            }

            $column = implode(".", array_slice($col_parts,-2,2));




            $searchQuery->orderBy($column, $order["dir"]);


        }






        $sessions = $searchQuery
            ->offset(0)
            ->limit(100)
            ->get();


        //  dd(Input::all());

        return [
            "data" => $sessions,
            "recordsTotal" => $count,
            "recordsFiltered" => $s_count,
            "draw" => Input::get("draw"),


        ];
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->session->find($id)->delete();

		return Redirect::route('sessions.index');
	}

    public function close($id){


        $session = MedicalSession::find($id);

        $session->close();
        return Redirect::route('sessions.index');

    }

}
