@extends('layouts.default')



@section('pagetitle')
Κατάλογος Ασθενών

<div class="pull-right">{{ link_to_route('patients.create', 'Καταχώρηση νέου ασθενούς', null, array('class' => 'btn  btn-success')) }}</div>

@endsection

@section('breadcrumb')
<ol class="breadcrumb">
	<li><a href="{{URL::to('/')}}">Κέντρο Υγείας</a></li>
	<li class="active">Κατάλογος ασθενών</li>

</ol>
@stop


@section("scripts")

<script>
	$(document).ready(function() {
		$('#patients').dataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": "{{URL::to('api/patients/index')}}",
			"columns": [
				{render: function ( data, type, row ) {
					return "<a href='"+baseURL+"/patients/"+row.id+"'>" + row.onomatepwnimo +"</a>";
				} },
				{ "data": "amka" }

			],
			language:{url:"https://cdn.datatables.net/plug-ins/a5734b29083/i18n/Greek.json"}
		} );
	} );
</script>
@stop


@section('content')

@if ($patients->count())
	<table class="table table-striped" id="patients">
		<thead>
			<tr>
				<th>Ονοματεπώνυμο</th>

				<th>ΑΜΚΑ</th>

			</tr>
		</thead>

		<!--tbody>
			@foreach ($patients as $patient)
				<tr>
					<td>{{{ $patient->name }}} {{{ $patient->surname }}}</td>

					<td>{{{ $patient->amka }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('patients.destroy', $patient->id))) }}
                            {{ Form::submit('Διαγραφή', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('patients.edit', 'Επεξεργασία', array($patient->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody-->
	</table>
@else
	There are no patients
@endif

@stop
