@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{URL::to('/')}}">Κέντρο Υγείας</a></li>
        <li class="active">Διαδικασίες</li>
        <li class="active">{{$task->process->name}}</li>
        @foreach($task->history as $history)
            <li>{{$history->name}}</li>
        @endforeach


        @foreach($task->nextTasks as $next)
            <li class="next-task">{{$next->name}}</li>
        @endforeach

    </ol>


@stop