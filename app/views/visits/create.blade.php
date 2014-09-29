@extends('layouts.default')


@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Νέα Επίσκεψη</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                {{ implode('', $errors->all('<li class="error">:message</li>')) }}
            </ul>
        </div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'visits.store', 'class' => 'form-horizontal')) }}

<div class="form-group">
    Ασθενής: {{$patient->name}} {{$patient->surname}} ({{$patient->amka}})
    Επίσκεψη στις: {{ date('Y-m-d H:i:s')}}

    <input type="hidden" id="patient_id" name="patient_id" value="{{$patient->id}}"/>
    <input type="hidden" id="when" name="when" value="{{ date('Y-m-d H:i:s');}}"/>

</div>

<div class="form-group">
    {{ Form::label('symptoms', 'Συμπτώματα:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::textarea('symptoms', Input::old('symptoms'), array('class'=>'form-control', 'placeholder'=>'Συμπτώματα')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('visit_classification_id', 'Κατηγορία περιστατικού:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        <select name="visit_classification_id" id="visit_classification_id">
        @foreach(VisitClassification::all() as $classification)
        <option value="{{$classification->id}}">{{$classification->name}}</option>
        @endforeach
        </select>
    </div>
</div>



<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
        {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@endsection
@stop





