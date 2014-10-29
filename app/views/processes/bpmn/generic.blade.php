@extends("layouts.default")

@section("pagetitle")
{{$task->name}}
@stop


@section("content")


<form method="POST" action="{{URL::route('process.task.complete',array($task->id))}}" class="form-horizontal">
@foreach($form->formProperties as $field)
<div class=" form-actions">
    <div class="form-group">
 <label class="col-sm-2 control-label" for="{{$field->id}}">{{$field->name}}</label>

        <div class="col-sm-10">
@if($field->type== "enum")
<select class="form-control" name="{{$field->id}}" id="{{$field->id}}">
@foreach($field->enumValues as $enumValue)
<option value="{{$enumValue->id}}">{{$enumValue->name}}</option>
@endforeach
</select>
@elseif($field->type== "string")
<input name="{{$field->id}}" @if(!$field->writable) disabled @endif value="{{$field->value}}" id="{{$field->id}}" type="text" class="form-control"/>
@elseif($field->type == "date")

@endif

        </div>
    </div>
</div>
@endforeach

<button type="submit">Επόμενο βήμα</button>
</form>


@stop