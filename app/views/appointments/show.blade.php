@extends('layouts.default')
@section("pagetitle")
Ραντεβού
@endsection
@section('content')



<p>{{ link_to_route('appointments.index', 'Return to All appointments', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>When</th>
				<th>Patient_id</th>
				<th>Context</th>
				<th>Doctor_id</th>
				<th>Scheduler_id</th>
		</tr>
	</thead>

	<tbody>
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
	</tbody>
</table>

@stop
