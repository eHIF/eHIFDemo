@extends('layouts.default')

@section('pagetitle')
Κατάλογος Ασθενών
@endsection

@section('content')

<p>{{ link_to_route('patients.create', 'Καταχώρηση νέου ασθενούς', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($patients->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Όνομα</th>
				<th>Επώνυμο</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($patients as $patient)
				<tr>
					<td>{{{ $patient->name }}}</td>
					<td>{{{ $patient->surname }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('patients.destroy', $patient->id))) }}
                            {{ Form::submit('Διαγραφή', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('patients.edit', 'Επεξεργασία', array($patient->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no patients
@endif

@stop
