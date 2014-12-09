@extends("layouts.default")

@section("pagetitle")
    Διαδικασίες
@stop
@section("content")
    <ul>
        @foreach($processes as $process)
            <li><a href='{{URL::action("bpmn.start", array("id"=>$process->id))}}'>{{$process->name}}▶</a></li>
        @endforeach
    </ul>


    <ul>
        @foreach($tasks as $task)

            <li>

                <a href='{{URL::action("bpmn.next", array("id"=>$task->id))}}'>{{$task->process->name}}
                    ({{$task->processInstanceId}}): {{$task->name}}</a></li>
        @endforeach
    </ul>

@stop