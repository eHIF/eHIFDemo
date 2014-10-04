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
		$sessions = $this->session->all();

		return View::make('sessions.index', compact('sessions'));
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

			return Redirect::route('sessions.show', $id);
		}

		return Redirect::route('sessions.edit', $id)
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
		$this->session->find($id)->delete();

		return Redirect::route('sessions.index');
	}

}
