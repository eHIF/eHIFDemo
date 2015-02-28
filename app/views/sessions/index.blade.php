@extends('layouts.default')

@section("pagetitle")
    Συνεδρίες με τον Ιατρό
@endsection

@section("scripts")
    <script>
        $(document).ready(function () {
            $('#sessions').dataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{URL::to('api/sessions/index')}}",
                "order": [[1, "desc"]],
                responsive:"true",
                "columns": [
                    {data: "id"},
                    {data: "created_at"},
                    {data: "patient.onomatepwnimo"},
                    {data: "doctor"},
                    {
                        render: function (data, type, full, meta) {

                            var div = document.createElement("div");
                            $(div).addClass("btn-group");

                            if (full.visit.visit_status.name == "pending" || full.visit.visit_status.name == "session") {
                                var form = document.createElement("form");
                                var closeButton = document.createElement("button");
                                $(form).attr("method", "post").attr("action", baseURL + "/sessions/" + full.id + "/close");
                                $(form).addClass("btn-group");

                                $(closeButton).attr("type", "submit").addClass("btn btn-danger");
                                $(closeButton).attr("title","Κλείσιμο");
                                $(closeButton).html("<i class='fa fa-times'></i>");
                                $(closeButton).attr("data-toggle","tooltip");

                                $(form).append(closeButton);

                                $(div).append(form);
                            }

                            if (full.visit.visit_status.name == "session") {

                                form = document.createElement("form");
                                $(form).addClass("btn-group");
                                var doctorButton = document.createElement("button");
                                $(form).attr("method", "get").attr("action", baseURL + "/sessions/" + full.id + "/edit");

                                $(doctorButton).attr("type", "submit").addClass("btn btn-warning");
                                $(doctorButton).attr("title","Προβολή");
                                $(doctorButton).attr("data-toggle","tooltip");

                                $(doctorButton).html("<i class='fa fa-eye'></i>");
                                $(form).append(doctorButton);

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


        <table width="100%" id="sessions" class="table table-striped">
            <thead>
            <tr>
                <th>Α/Α</th>
                <th>Ημερομηνία και ώρα</th>
                <th>Ασθενής</th>
                <th>Θεράπων Ιατρός</th>

                <th>&nbsp;</th>
            </tr>
            </thead>

            <tbody>

            </tbody>
        </table>


@stop
