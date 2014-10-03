@extends('layouts.scaffold')

@section('main')

<h1>Show Session</h1>

<p>{{ link_to_route('sessions.index', 'Return to All sessions', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $Session->id }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('sessions.destroy', $Session->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('sessions.edit', 'Edit', array($Session->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
