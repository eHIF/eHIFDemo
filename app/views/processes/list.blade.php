@extends("layouts.default")

@section("pagetitle")
Διαδικασίες
@stop
@section("content")
<ul>
@foreach($processes as $process)
<li><a href='{{URL::action("bpmn.start", array("id"=>$process->id))}}'>{{$process->name}}</a></li>
@endforeach
</ul>

{{$tasks[5]->variables[0]->value}}

<ul>
    @foreach($tasks as $task)
    <?php $vars = $tasks[5]->variables;  ?>

    <li>

      <a href='{{URL::action("bpmn.next", array("id"=>$task->id))}}'>{{$task->name}}</a></li>
    @endforeach
</ul>

    @stop