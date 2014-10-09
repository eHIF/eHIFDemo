@extends('layouts.default')
@section('pagetitle')
Ασθενής: {{$patient->name}} {{$patient->surname}}
@endsection
@section('content')

<h1></h1>

<p>{{ link_to_route('patients.index', 'Return to All patients', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
				<th>Surname</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $patient->name }}}</td>
					<td>{{{ $patient->surname }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('patients.destroy', $patient->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('patients.edit', 'Edit', array($patient->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
