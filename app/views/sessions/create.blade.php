@extends('layouts.default')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Νέα Συνεδρία</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'sessions.store', 'class' => 'form-horizontal')) }}
Ασθενής: {{$patient->surname}} {{$patient->name}} ({{$patient->amka}})
        <div class="form-group">
            {{ Form::label('symptoms', 'Συμπτώματα:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('symptoms', $visit->symptoms, Input::old('symptoms'), array('class'=>'form-control')) }}
            </div>
            <div class="col-sm-10">
              {{ Form::hidden('patient_id', $patient->id, Input::old('patient_id'), array('class'=>'form-control')) }}
            </div>
            <div class="col-sm-10">
              {{ Form::hidden('visit_id', $visit->id, Input::old('visit_id'), array('class'=>'form-control')) }}
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


