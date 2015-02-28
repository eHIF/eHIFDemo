@extends('layouts.default')

@section("pagetitle")
Προσωπικό
@endsection


@section('content')





	<table class="table table-striped">
		<thead>
			<tr>
                <th>Ονοματεπώνυμο</th>
				<th>Ρόλος</th>

			</tr>
		</thead>

		<tbody>
			@foreach ($users as $User)
				<tr>

                    <td>{{{ $User->name }}} {{{ $User->surname }}}</td>
                    <td>{{{ $User->roles()->first()->friendly }}} </td>

				</tr>
			@endforeach
		</tbody>
	</table>

@stop
