@extends('layouts.default')
@section("pagetitle")
Ενημέρωση ραντεβού
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

{{ Form::model($appointment, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('appointments.update', $appointment->id))) }}

        <div class="form-group">
            {{ Form::label('when', 'When:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('when', Input::old('when'), array('class'=>'form-control', 'placeholder'=>'When')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('patient_id', 'Patient_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'patient_id', Input::old('patient_id'), array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('context', 'Context:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('context', Input::old('context'), array('class'=>'form-control', 'placeholder'=>'Context')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('doctor_id', 'Doctor_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'doctor_id', Input::old('doctor_id'), array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('scheduler_id', 'Scheduler_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('scheduler_id', Input::old('scheduler_id'), array('class'=>'form-control', 'placeholder'=>'Scheduler_id')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('appointments.show', 'Cancel', $appointment->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop