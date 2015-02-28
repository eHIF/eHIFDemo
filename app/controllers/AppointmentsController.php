<?php

use Carbon\Carbon;

class AppointmentsController extends BaseController {

	/**
	 * Appointment Repository
	 *
	 * @var Appointment
	 */
	protected $appointment;

	public function __construct(Appointment $appointment)
	{
		$this->appointment = $appointment;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$todaysAppointments= Appointment::whereBetween('when', array(Carbon::today(), Carbon::today()->addDay()))->with("patient")->get();


		return View::make('appointments.index')->with("todaysAppointments", $todaysAppointments);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($patient_id)
	{
		$patient = Patient::find($patient_id);
		$role = "doctor";

		$doctors = User::with("roles")->whereHas("roles",  function($q) use($role)
		{
			$q->where('name', '=', $role);

		})->get()->lists("name","id");




		return View::make('appointments.create')->with("patient", $patient)->with("doctors", $doctors);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Appointment::$rules);

		if ($validation->passes())
		{
			$this->appointment->create($input);

			return Redirect::route('appointments.index');
		}

		return Redirect::route('appointments.create')
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
		$appointment = $this->appointment->findOrFail($id);

		return View::make('appointments.show', compact('appointment'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$appointment = $this->appointment->find($id);

		if (is_null($appointment))
		{
			return Redirect::route('appointments.index');
		}

		$role = "doctor";

		$doctors = User::with("roles")->whereHas("roles",  function($q) use($role)
		{
			$q->where('name', '=', $role);

		})->get()->lists("name","id");


		return View::make('appointments.edit', compact('appointment'))->with("doctors", $doctors);
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
		$validation = Validator::make($input, Appointment::$rules);

		if ($validation->passes())
		{
			$appointment = $this->appointment->find($id);
			$appointment->update($input);

			return Redirect::route('appointments.index');
		}

		return Redirect::route('appointments.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->appointment->find($id)->delete();

		return Redirect::route('appointments.index');
	}


	public function api_index()
	{

		// dd(Input::all());
		$query = Appointment
			::with("patient")
			->with("doctor")
			->with("scheduler")
			->join("patients", "appointments.patient_id","=","patients.id")
			->join("users", "appointments.doctor_id","=","users.id")
			->select(["appointments.*","appointments.id as id"])
		;

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
		//dd(DB::getQueryLog());
		return [
			"data" => $sessions,
			"recordsTotal" => $count,
			"recordsFiltered" => $s_count,
			"draw" => Input::get("draw"),


		];

	}

}
