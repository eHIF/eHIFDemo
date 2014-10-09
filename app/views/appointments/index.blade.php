@extends('layouts.default')
@section("pagetitle")
Κατάλογος Ραντεβού
@endsection
@section('content')

<h1>All Appointments</h1>

<p>{{ link_to_route('appointments.create', 'Add New Appointment', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($appointments->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>When</th>
				<th>Patient_id</th>
				<th>Context</th>
				<th>Doctor_id</th>
				<th>Scheduler_id</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($appointments as $appointment)
				<tr>
					<td>{{{ $appointment->when }}}</td>
					<td>{{{ $appointment->patient_id }}}</td>
					<td>{{{ $appointment->context }}}</td>
					<td>{{{ $appointment->doctor_id }}}</td>
					<td>{{{ $appointment->scheduler_id }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('appointments.destroy', $appointment->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('appointments.edit', 'Edit', array($appointment->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no appointments
@endif

@stop
