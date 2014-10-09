<?php

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
		$appointments = $this->appointment->all();

		return View::make('appointments.index', compact('appointments'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('appointments.create');
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

		return View::make('appointments.edit', compact('appointment'));
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

			return Redirect::route('appointments.show', $id);
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

}
