@extends('layouts.default')
@section("pagetitle")
Κατάλογος Ραντεβού
@endsection


@section("scripts")
	<script>
		$(document).ready(function () {
			$('#appointments').dataTable({
				"processing": true,
				"serverSide": true,
				"ajax": "{{URL::to('api/appointments/index')}}",
				"order": [[1, "desc"]],
				"responsive":true,
				"columns": [
					{data: "id"},
					{data: "when", render:function(data,type,full, meta){
						return moment(data).format("YYYY-MM-DD HH:mm");
					}},
					{data: "patient.onomatepwnimo"},
					{data:"context"},
					{data: "doctor.name"},
					{data: "scheduler.name"},
					{
						render: function (data, type, full, meta) {
							var div = document.createElement("div");
							$(div).addClass("btn-group");
							{

								form = document.createElement("form");
								var editButton = document.createElement("button");
								$(form).attr("method", "get").attr("action", baseURL + "/appointments/" + full.id +"/edit");

								$(editButton).attr("type", "submit").addClass("btn btn-success");
								$(editButton).attr("title","Προβολή");
								$(editButton).html("<i class='fa fa-eye'></i>");
								$(editButton).attr("data-toggle","tooltip");
								$(form).append(editButton);

								$(div).append(form);

							}

							return div.outerHTML;




						}
					}

				],
				language: {url: "https://cdn.datatables.net/plug-ins/a5734b29083/i18n/Greek.json"}
			});
		});
	</script>
@stop


@section('content')
<i>Για να κλείσετε ένα νέο ραντεβού, αναζητήστε τον ασθενή από την <a href="{{URL::to("patients	")}}">λίστα ασθενών</a>  (ή καταχωρήστε ένα νέο) και μετά κάντε κλικ στο πλήκτρο "Ραντεβού"</i>
	<table width="100%" id="appointments" class="table table-striped">
		<thead>
		<tr>
			<th>Α/Α;</th>
			<th>Ημερομηνία</th>
			<th>Ασθενής</th>
			<th>Παρατηρήσεις</th>
			<th>Ιατρός</th>
			<th>Προγραμματισμός</th>
			<th>Ενέργειες</th>
		</tr>
		</thead>

		<tbody>

		</tbody>
	</table>

<div class="panel panel-primary">
	<div class="panel-heading">
		Σημερινά ραντεβού
	</div>
	<div class="panel-body">
		<ul class="list-group">


			@foreach($todaysAppointments as $appointment)
				<li class="list-group-item"><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$appointment->when)->format("H:i")}} - {{$appointment->patient->onomatepwnimo}}</li>

			@endforeach

		</ul>

	</div>
	<div class="panel-footer">

	</div>
</div>




@stop
