@extends('layouts.default')

@section("pagetitle")
    Επισκέψεις
@endsection

@section("scripts")
    <script>
        $(document).ready(function () {
            $('#visits').dataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{URL::to('api/visits/index')}}",
                "columns": [
                    {data: "patient.onomatepwnimo"},
                    {data: "patient.amka"},
                    {data: "created_at"},
                    {render: function ( data, type, row ) {
                        return "<a href='"+baseURL+"/patients/"+row.id+"'>" + row.onomatepwnimo +"</a>";
                    } }
                ],
                language:{url:"https://cdn.datatables.net/plug-ins/a5734b29083/i18n/Greek.json"}
            });
        });
    </script>
@stop


@section("content")




    <table class="table table-striped table-bordered" id="visits">
        <thead>
        <tr>
            <th>Ασθενής</th>
            <th>ΑΜΚΑ</th>
            <th>Ημερομηνία & ώρα</th>
            <th>Ενέργειες</th>
        </tr>
        </thead>
        <tbody>


        </tbody>

    </table>

@endsection