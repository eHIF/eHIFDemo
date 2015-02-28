@extends('layouts.default')

@section("pagetitle")
    Επισκέψεις στο Κέντρο Υγείας
@endsection

@section("scripts")
    <script>
        $(document).ready(function () {
            $('#visits').dataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{URL::to('api/visits/index')}}",
                "order": [[ 3, "desc" ],[ 4, "desc" ]],
                width:"100%",
                responsive:true,
                "columns": [
                    {data: "id"},
                    {data: "patient.onomatepwnimo"},
                    {data: "patient.amka"},
                    {data: "created_at"},
                    {data: "visit_status.description"},
                    {render: function (  data, type, full, meta  ) {

                        var div = document.createElement("div");
                        $(div).addClass("btn-group");

                        if(full.visit_status.name == "pending" || full.visit_status.name == "session") {
                            var form = document.createElement("form");
                            $(form).toggleClass("btn-group");
                            var closeButton = document.createElement("button");
                            $(form).attr("method", "post").attr("action", baseURL + "/visits/" + full.id + "/close");

                            $(closeButton).attr("type", "submit").addClass("btn btn-danger");
                            $(closeButton).attr("data-toggle","tooltip");
                            $(closeButton).attr("title", "Κλείσιμο");


                            $(closeButton).html("<i class='fa fa-times'></i>");

                            $(form).append(closeButton);

                            $(div).append(form);
                        }

                        if(full.visit_status.name == "pending" ){

                            form = document.createElement("form");
                            $(form).toggleClass("btn-group");
                            var doctorButton = document.createElement("button");
                            $(form).attr("method", "post").attr("action", baseURL+"/visits/"+full.id+"/session");

                            $(doctorButton).attr("type","submit").addClass("btn btn-warning");
                            $(doctorButton).text("Στο ιατρείο");
                            $(doctorButton).attr("title","Στο ιατρειο");
                            $(doctorButton).attr("data-toggle","tooltip");

                            $(doctorButton).html("<i class='fa fa-stethoscope'></i>");
                            $(form).append(doctorButton);

                            $(div).append(form);

                        }




                        return div.outerHTML;


                    } }
                ],
                language:{url:"https://cdn.datatables.net/plug-ins/a5734b29083/i18n/Greek.json"}
            });
        });
    </script>
@stop


@section("content")




    <table width="100%" class="table table-striped" id="visits">
        <thead>
        <tr>
            <th>Α/Α</th>
            <th>Ασθενής</th>
            <th>ΑΜΚΑ</th>
            <th>Ημερομηνία & ώρα</th>
            <th>Κατάσταση</th>
            <th>Ενέργειες</th>
        </tr>
        </thead>
        <tbody>


        </tbody>

    </table>

@endsection