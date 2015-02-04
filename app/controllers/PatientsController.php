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

		$genders = Gender::all()->lists("name","id");
		$countries = Country::all()->lists("name","id");

		return View::make('patients.create')->with("genders", $genders)->with("countries", $countries);
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

		$genders = Gender::all()->lists("name","id");
		$countries = Country::all()->lists("name","id");

		if (is_null($patient))
		{
			return Redirect::route('patients.index');
		}

		return View::make('patients.edit', compact('patient'))->with("genders", $genders)->with("countries", $countries);
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

	public function api_index(){

        // dd(Input::all());
        $query = Patient
            ::select("patients.*");

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


        $patients = $searchQuery
            ->offset(Input::get("start", 0))
            ->limit(Input::get("length", 10))
            ->get();


        //  dd(Input::all());

        return [
            "data" => $patients,
            "recordsTotal" => $count,
            "recordsFiltered" => $s_count,
            "draw" => Input::get("draw"),


        ];
	}
}
