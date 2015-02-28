@extends('layouts.default')

@section("pagetitle")
Καταχώρηση νέου ραντεβού
@endsection

@section('content')



<div class="row">
    <div class="col-md-10 col-md-offset-2">
        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'appointments.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('patient', 'Ασθενής:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
                {{$patient->onomatepwnimo}}
            </div>
        </div>

        <input type="hidden" name="patient_id" value="{{$patient->id}}"/>

        <div class="form-group">








            {{ Form::label('when', 'Ημερομηνία:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
                <div class='input-group date datetimepicker'>
                    <input data-date-format="YYYY-MM-DD hh:mm" type='text' id="when" name="when" class="form-control" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('context', 'Παρατηρήσεις:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('context', Input::old('context'), array('class'=>'form-control', 'placeholder'=>'Παρατηρήσεις')) }}
            </div>
        </div>

<input type="hidden" name="scheduler_id" value="{{Auth::user()->id}}"/>


        <div class="form-group">
            {{ Form::label('doctor_id', 'Ιατρός:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::select('doctor_id', $doctors, array('class'=>'form-control', 'placeholder'=>'Ιατρός')) }}
            </div>
        </div>



<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Αποθήκευση', array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@stop


@section("scripts")
    <script type="text/javascript">
        $(document).ready(function(){
            $('.datetimepicker').datetimepicker({
                language:'el',
                pickTime: true
            });
        });


    </script>
@stop