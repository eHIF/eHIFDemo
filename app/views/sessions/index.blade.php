@extends('layouts.default')

@section("pagetitle")
Όλες οι συνεδρίες
@endsection


@section('content')



<p>{{ link_to_route('sessions.create', 'Add New Session', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($sessions->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Id</th>
				<th>Ασθενής</th>
				<th>Θεράπων Ιατρός</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($sessions as $Session)
				<tr>
					<td>{{{ $Session->id }}}</td>
                    <td>{{{ $Session->patient->name }}} {{{ $Session->patient->surname }}}</td>
                    <td>{{{ $Session->doctor->name }}} </td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('sessions.destroy', $Session->id))) }}
                            {{ Form::submit('Διαγραφή', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('sessions.edit', 'Επεξεργασία', array($Session->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no sessions
@endif

@stop
