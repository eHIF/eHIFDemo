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
        $(document).ready(function () {
            $('#patients').dataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{URL::to('api/patients/index')}}",
                "responsive":true,
                "columns": [
                    {data: "id"},
                    {
                        data: "onomatepwnimo", render: function (data, type, row) {
                        return "<a href='" + baseURL + "/patients/" + row.id + "'>" + row.onomatepwnimo + "</a>";
                    }
                    },
                    {"data": "amka"},


                    {
                        render: function (data, type, full, meta) {

                            var div = document.createElement("div");
                            $(div).addClass("btn-group");
                             {
                                var form = document.createElement("form");
                                $(form).addClass("btn-group");
                                var closeButton = document.createElement("button");
                                $(form).attr("method", "get").attr("action", baseURL + "/visits/create/" + full.id );

                                $(closeButton).attr("type", "submit").addClass("btn btn-info");
                                $(closeButton).attr("title","Έναρξη επίσκεψης");

                                 $(closeButton).html("<i class='fa fa-h-square'></i>");
                                 $(closeButton).attr("data-toggle","tooltip");

                                $(form).append(closeButton);

                                $(div).append(form);
                            }

                           {

                                form = document.createElement("form");
                               $(form).addClass("btn-group");
                                var doctorButton = document.createElement("button");
                                $(form).attr("method", "get").attr("action", baseURL + "/patients/" + full.id );

                                $(doctorButton).attr("type", "submit").addClass("btn btn-warning");
                                $(doctorButton).attr("title","Προβολή");
                               $(doctorButton).html("<i class='fa fa-eye'></i>");
                               $(doctorButton).attr("data-toggle","tooltip");
                                $(form).append(doctorButton);

                                $(div).append(form);

                            }

                            {

                                form = document.createElement("form");
                                $(form).addClass("btn-group");
                                var appointmentButton = document.createElement("button");
                                $(form).attr("method", "get").attr("action", baseURL + "/appointments/create/" + full.id );

                                $(appointmentButton).attr("type", "submit").addClass("btn btn-success");
                                $(appointmentButton).attr("title","Ραντεβού");
                                $(appointmentButton).html("<i class='fa fa-calendar-o'></i>");
                                $(appointmentButton).attr("data-toggle","tooltip");
                                $(form).append(appointmentButton);

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


        <table width="100%" class="table table-striped" id="patients">
            <thead>
            <tr>
                <th>A/A</th>
                <th>Ονοματεπώνυμο</th>
                <th>ΑΜΚΑ</th>
                <th></th>

            </tr>
            </thead>

<tbody></tbody>
        </table>


@stop
