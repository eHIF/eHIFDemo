@extends('layouts.default')
@section('pagetitle')
Συνεδρία
@endsection
@section('content')
@if($session->closed)
Η συνεδρία αυτή έχει ολοκληρωθεί
@endif

<p>{{ link_to_route('sessions.index', 'Return to All sessions', null, array('class'=>'btn btn-lg btn-primary')) }}</p>



<form action="{{URL::to('sessions/close')}}" method="post">
    <input type="hidden" name="id" id="id" value="{{$session->id}}"/>
    <button type="submit" class="btn btn-primary">Κλείσιμο Συνεδρίας</button>
</form>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $session->id }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('sessions.destroy', $session->id))) }}
                            {{ Form::submit('Διαγραφή', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('sessions.edit', 'Επεξεργασία', array($session->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
