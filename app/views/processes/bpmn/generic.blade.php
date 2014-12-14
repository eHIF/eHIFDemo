@extends("layouts.default")

@section("pagetitle")
    {{$task->name}}
@stop

@section("scripts")
    <script src="{{URL::asset('bower_resources/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('input.datepicker').datepicker({
                format: "dd-M-yyyy"
            });
        });
    </script>
@stop

@section("content")

    <link rel="stylesheet" href="{{URL::asset('bower_resources/bootstrap-datepicker/css/datepicker.css')}}"/>
    <form method="POST" action="@if(!isset($submit)){{URL::route('process.task.complete',array($task->id))}}@else{{$submit}} @endif" class="form-horizontal">
        @foreach($form->formProperties as $field)
            <div class=" form-actions">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="{{$field->id}}">{{$field->name}}</label>

                    <div class="col-sm-10">
                        @if($field->type== "enum")
                            <select  @if($field->required) required @endif class="form-control" name="{{$field->id}}"
                                                           id="{{$field->id}}">
                                @foreach($field->enumValues as $enumValue)
                                    <option value="{{$enumValue->id}}">{{$enumValue->name}}</option>
                                @endforeach
                            </select>
                        @elseif($field->type== "string" || $field->type ==NULL)
                            <input name="{{$field->id}}" @if(!$field->writable) disabled @endif @if($field->required)
                                   required @endif value="{{$field->value}}" id="{{$field->id}}" type="text"
                                   class="form-control"/>
                        @elseif($field->type == "date")
                            <input name="{{$field->id}}" @if($field->required) required @endif  @if(!$field->writable)
                                   disabled @endif value="{{$field->value}}" id="{{$field->id}}"   type="text"
                                   class="datepicker form-control">
                        @endif

                    </div>
                </div>
            </div>
        @endforeach
        <div class="pull-right">
            <button class="btn btn-primary btn-lg" type="submit">Επόμενο βήμα</button>
        </div>

    </form>


@stop