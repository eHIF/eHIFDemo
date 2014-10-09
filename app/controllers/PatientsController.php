<?php

class PatientsController extends BaseController {

	/**
	 * Patient Repository
	 *
	 * @var Patient
	 */
	protected $patient;

	public function __construct(Patient $patient)
	{
		$this->patient = $patient;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$patients = $this->patient->all();

		return View::make('patients.index', compact('patients'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('patients.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Patient::$rules);

		if ($validation->passes())
		{
			$this->patient->create($input);

			return Redirect::route('patients.index');
		}

		return Redirect::route('patients.create')
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
		$patient = $this->patient->findOrFail($id);

		return View::make('patients.show', compact('patient'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$patient = $this->patient->find($id);

		if (is_null($patient))
		{
			return Redirect::route('patients.index');
		}

		return View::make('patients.edit', compact('patient'));
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
		$validation = Validator::make($input, Patient::$rules);

		if ($validation->passes())
		{
			$patient = $this->patient->find($id);
			$patient->update($input);

			return Redirect::route('patients.show', $id);
		}

		return Redirect::route('patients.edit', $id)
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
		$this->patient->find($id)->delete();

		return Redirect::route('patients.index');
	}
    public function api_search($term = ""){
        $patients = Patient::like($term)->get();

        return $patients;
    }

    public function api_update(){
        $patient = Patient::find(Input::get("id"));
        $patient->update(Input::except("id"));
    }

    public function api_create(){
        $patient = Patient::create(Input::all());

        return array("id"=>$patient->id);


    }
}
