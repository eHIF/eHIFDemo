@extends('layouts.default')
@section('pagetitle')
Edit Session
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

{{ Form::model($session, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('sessions.update', $session->id))) }}

        <div class="form-group">
            {{ Form::label('diagnosis', 'Diagnosis:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('diagnosis', '', Input::old('id'), array('class'=>'form-control')) }}
            </div>
        </div>

<a>Παραπομπή για εξετάσεις</a>
<a>Φαρμακευτική Αγωγή</a>

<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('sessions.show', 'Cancel', $session->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop