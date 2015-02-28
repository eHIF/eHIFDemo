@extends('layouts.default')
@section('pagetitle')
	{{$patient->onomatepwnimo}} <strong>{{$patient->name}} {{$patient->surname}}</strong> <div class="pull-right">
	{{ link_to_route('patients.edit', 'Ενημέρωση στοιχείων...', array($patient->id), array('class' => 'btn btn-info')) }}
{{Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('patients.destroy', $patient->id))) }}
{{ Form::submit('Διαγραφή', array('class' => 'btn btn-danger')) }}
	{{ Form::close() }}</div>
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
	<li><a href="{{URL::to('/')}}">Κέντρο Υγείας</a></li>
	<li><a href="{{URL::to('/patients')}}">Ασθενείς</a></li>
	<li class="active">{{$patient->onomatepwnimo}} {{$patient->surname}}</li>

</ol>
@stop


@section('content')

	<div class="col-sm-6">

		<div class="panel panel-primary">
			<div class="panel-heading">
				Ιστορικό Συνεδριών
			</div>
			<div class="panel-body">
				<ul class="list-group">

					@foreach($patient->sessions as $session)
						<li class="list-group-item">
							<span><i class="fa fa-stethoscope"></i> <a href="{{URL::to("sessions/".$session->id."/edit")}}">{{$session->created_at}}</a> </span> <strong>(Συνεδρία με: {{$session->doctor->name}})</strong>
							<ul>
								@foreach($session->diseases as $disease)
									<li>{{$disease->title}}</li> @endforeach
							</ul></li>

					@endforeach


				</ul>

			</div>
			<div class="panel-footer">

			</div>
		</div>



	</div>
<div class="col-sm-6">

	<div class="col-sm-12">
		<h3><small>Πατρώνυμο:</small> {{{$patient->patronimo}}} </h3>
		<h5>Ημερομηνία Γέννησης: {{{$patient->etosgennisis}}}  ({{DateTime::createFromFormat('Y-m-d', $patient->etosgennisis,  new DateTimeZone('Europe/Athens'))
			->diff(new DateTime('now',  new DateTimeZone('Europe/Athens')))
			->y;}} ετών)</h5>
		<h5>ΑΜΚΑ: {{{$patient->amka}}}</h5>
		<h5>Διεύθυνση: {{{$patient->town}}}</h5>
		<h5>Τηλέφωνο: {{{$patient->phone}}}</h5>
	</div>
</div>



@stop
