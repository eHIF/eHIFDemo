@extends('layouts.default')
@section('pagetitle')
Επεξεργασία Ασθενούς:  {{$patient->name}} {{$patient->surname}}
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

{{ Form::model($patient, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('patients.update', $patient->id))) }}

        <div class="form-group">
            {{ Form::label('name', 'Name:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('name', Input::old('name'), array('class'=>'form-control', 'placeholder'=>'Name')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('surname', 'Surname:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('surname', Input::old('surname'), array('class'=>'form-control', 'placeholder'=>'Surname')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('patients.show', 'Cancel', $patient->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop