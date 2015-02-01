@extends("layouts.default")

@section("meta")
    <meta http-equiv="refresh" content="10" >

@stop

@section("pagetitle")
    Διαδικασίες
@stop
@section("content")
    <div class="col-sm-4">
        <div class="panel panel-info ">
            <div class="panel-heading">
                Διαθέσιμες Διαδικασίες
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    @foreach($processes as $process)
                        <li class="list-group-item"><a target="_blank"
                                    href='{{URL::action("bpmn.start", array("id"=>$process->id))}}'>{{$process->name}}</a>
                            <span class="text-success"><i class="fa fa-caret-square-o-right"></i></span></li>
                    @endforeach
                </ul>
            </div>
            <div class="panel-footer">
                <i>Κάντε κλικ για την εκκίνηση μιας διαδικασίας.</i>
            </div>
        </div>

    </div>

    <div class="col-sm-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Ενεργές Διαδικασίες
            </div>
            <div class="panel-body">

                <ul class="list-group">
                    @foreach($tasks as $task)

                        <li class="list-group-item">
                            <span class=" label label-primary"><i
                                        class="fa fa-user"></i> {{$task->processInstance->getVariable("amka")}}</span>
                            <span class="process-name" title="{{$task->process->description}}">{{$task->process->name}}</span>
                            :<a target="_blank" @if(($task->assignee!=NULL)) class=""
                                                            @endif href='{{URL::action("bpmn.next", array("id"=>$task->id))}}'>   {{$task->name}}   <span class="text-warning"><i
                                            class="fa fa-chevron-circle-right"></i></span></a></li>
                    @endforeach
                </ul>

            </div>
            <div class="panel-footer">
                <i>Κάντε κλικ για τη συνέχιση μιας ενεργής διαδικασίας</i>
            </div>
        </div>

    </div>



@stop