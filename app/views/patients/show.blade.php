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

	<div class="col-sm-6">
		<h3>{{{$patient->onomatepwnimo}}} του {{{$patient->patronimo}}} </h3>
		<h5>{{{$patient->etosgennisis}}}  ({{DateTime::createFromFormat('Y-m-d', $patient->etosgennisis,  new DateTimeZone('Europe/Athens'))
			->diff(new DateTime('now',  new DateTimeZone('Europe/Athens')))
			->y;}} ετών)</h5>
		<h5>ΑΜΚΑ: {{{$patient->amka}}}</h5>
		<h5>Διεύθυνση: {{{$patient->town}}}</h5>
		<h5>Τηλέφωνο: {{{$patient->phone}}}</h5>
	</div>
</div>

<div class="col-sm-12">
    <h3>Ιστορικό Συνεδριών</h3>
    <ul>

        @foreach($patient->sessions as $session)
            <li>
                <span><a href="{{URL::to("sessions/".$session->id)}}">{{$session->created_at}}</a> </span> <strong>(Συνεδρία με: {{$session->doctor->name}})</strong>
                <ul>
                    @foreach($session->diseases as $disease)
                        <li>{{$disease->title}}</li> @endforeach
                </ul></li>

        @endforeach
    </ul>

</div>


@stop
