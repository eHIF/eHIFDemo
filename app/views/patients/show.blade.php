@extends('layouts.default')
@section('pagetitle')
Ασθενής: <strong>{{$patient->name}} {{$patient->surname}}</strong> <div class="pull-right">
	{{ link_to_route('patients.edit', 'Ενημέρωση στοιχείων...', array($patient->id), array('class' => 'btn btn-info')) }}
{{Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('patients.destroy', $patient->id))) }}
{{ Form::submit('Διαγραφή', array('class' => 'btn btn-danger')) }}
	{{ Form::close() }}</div>
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
	<li><a href="{{URL::to('/')}}">Κέντρο Υγείας</a></li>
	<li><a href="{{URL::to('/patients')}}">Ασθενείς</a></li>
	<li class="active">{{$patient->name}} {{$patient->surname}}</li>

</ol>
@stop


@section('content')

<div class="col-sm-12">
	<div class="col-sm-3">Photo</div>
	<div class="col-sm-6">
		<h3>{{{$patient->name}}} {{{mb_substr($patient->fathername,0,1)}}}. {{{$patient->surname}}} </h3>
		<h5>{{{$patient->birthday}}}  ({{DateTime::createFromFormat('Y-m-d', $patient->birthday,  new DateTimeZone('Europe/Athens'))
			->diff(new DateTime('now',  new DateTimeZone('Europe/Athens')))
			->y;}} ετών)</h5>
		<h5>ΑΜΚΑ: {{{$patient->amka}}}</h5>
	</div>
</div>


@stop
