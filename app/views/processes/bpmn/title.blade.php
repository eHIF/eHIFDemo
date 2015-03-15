@section("pagetitle")

        <div class="col-sm-10">
            {{$task->name}}
        </div>

        <div class="col-sm-2 pull-right">
            <form action="{{URL::to('processes/delete/'.$task->processInstance->id)}}" method="post">
                <button class="btn  btn-danger">Ακύρωση</button>
            </form>

        </div>


@stop