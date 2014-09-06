@extends('layouts.default')
@section('content')

<link rel="stylesheet" href="{{ URL::asset('bower_resources/DataTables/media/css/jquery.dataTables.css') }}"/>
<link rel="stylesheet" href="//cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables
.bootstrap
.css"/>
<script  src="{{ URL::asset('bower_resources/DataTables/media/js/jquery.dataTables.js') }}"></script>
<script  src="//cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function() {


        $('table').dataTable(

            {"processing": true, "serverSide": true, "ajax": "{{URL::to('api/users/list')}}",

                "columns": [
                    { "data": "name","defaultContent": "N/A", "render": function ( data, type, full, meta ) {
                        var url = '{{URL::to("users/view")}}/'+full.username;
                        return '<a href="'+url+'">'+data+' '+full.surname+' ('+full.username+')</a>';
                    }},
                    { "data": "phone","defaultContent": "N/A" },
                    { "data": "address","defaultContent": "N/A" },
                    { "data": "company.name","defaultContent": "N/A", "orderable":false }
                ]
            }
        );
    });

</script>

<div class="page-header">
<h1>Users list</h1>
<div class="btn-group pull-right">

<a href="{{URL::to('users/create')}}" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> Add new User</a>
</div>
</div>



<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>User</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Company</th>
        </tr>
    </thead>


</table>



@stop