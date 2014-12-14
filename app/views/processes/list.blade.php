@extends("layouts.default")

@section("pagetitle")
    Διαδικασίες
@stop
@section("content")

    <div class="col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Ενεργές Διαδικασίες
            </div>
            <div class="panel-body">

                <ul>
                    @foreach($tasks as $task)

                        <li>

                            <a @if(($task->assignee!=NULL)) class="bg-info" @endif href='{{URL::action("bpmn.next", array("id"=>$task->id))}}'>{{$task->process->name}}
                                ({{$task->processInstanceId}}): {{$task->name}}   <span class="text-warning">⏯</span></a></li>
                    @endforeach
                </ul>

            </div>
            <div class="panel-footer">
                <i>Κάντε κλικ για τη συνέχιση μιας ενεργής διαδικασίας</i>
            </div>
        </div>

    </div>

<div class="col-sm-6">
    <div class="panel panel-info ">
        <div class="panel-heading">
            Διαθέσιμες Διαδικασίες
        </div>
        <div class="panel-body">
            <ul>
                @foreach($processes as $process)
                    <li><a href='{{URL::action("bpmn.start", array("id"=>$process->id))}}'>{{$process->name}}</a>   <span class="text-success">⏩</span></li>
                @endforeach
            </ul>
        </div>
        <div class="panel-footer">
            <i>Κάντε κλικ για την εκκίνηση μιας διαδικασίας.</i>
        </div>
    </div>

</div>


@stop