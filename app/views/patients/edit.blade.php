@extends('layouts.default')
@section('pagetitle')
Ενημέρωση στοιχείων ασθενούς:  <strong>{{$patient->name}} {{$patient->surname}}</strong>
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{{URL::to('/')}}">Κέντρο Υγείας</a></li>
    <li><a href="{{URL::to('/patients')}}">Ασθενείς</a></li>
    <li><a href="{{URL::to('/patients').'/'.$patient->id}}">{{$patient->name}} {{$patient->surname}}</a></li>
    <li class="active">Επεξεργασία</li>

</ol>
@stop

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                {{ implode('', $errors->all('
                <li class="error">:message</li>
                ')) }}
            </ul>
        </div>
        @endif
    </div>
</div>

{{ Form::model($patient, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('patients.update', $patient->id))) }}
<fieldset class="col-xs-6">
<div class="form-group">
    {{ Form::label('name', 'Όνομα:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('name', Input::old('name'), array('class'=>'form-control', 'placeholder'=>'Όνομα')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('surname', 'Επώνυμο:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('surname', Input::old('surname'), array('class'=>'form-control', 'placeholder'=>'Επώνυμο')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('amka', 'ΑΜΚΑ:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('amka', Input::old('amka'), array('class'=>'form-control', 'placeholder'=>'ΑΜΚΑ')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('fathername', 'Όνομα πατρός:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('fathername', Input::old('fathername'), array('class'=>'form-control', 'placeholder'=>'Όνομα
        πατρός')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('mothername', 'Όνομα μητρός:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('mothername', Input::old('mothername'), array('class'=>'form-control', 'placeholder'=>'Όνομα
        μητρός')) }}
    </div>
</div>
</fieldset>
<fieldset class="col-xs-6">
<div class="form-group">
    {{ Form::label('address', 'Διεύθυνση οικίας:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('address', Input::old('address'), array('class'=>'form-control', 'placeholder'=>'Διεύθυνση
        οικίας')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('zip', 'ΤΚ:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('zip', Input::old('zip'), array('class'=>'form-control', 'placeholder'=>'ΤΚ')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('area', 'Περιοχή:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('area', Input::old('area'), array('class'=>'form-control', 'placeholder'=>'Περιοχή')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('phone', 'Τηλέφωνο οικίας:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('phone', Input::old('phone'), array('class'=>'form-control', 'placeholder'=>'Τηλέφωνο οικίας')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('mobile', 'Κινητό τηλέφωνο:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('mobile', Input::old('mobile'), array('class'=>'form-control', 'placeholder'=>'Κινητό τηλέφωνο'))
        }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('nationality_id', 'Εθνικότητα:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('nationality_id', $countries, Input::old('nationality_id'),  array('class'=>'form-control')) }}

    </div>
</div>

<div class="form-group">
    {{ Form::label('gender_id', 'Φύλο:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('gender_id', $genders, Input::old('gender_id'),  array('class'=>'form-control')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('birthday', 'Ημερομηνία Γέννησης:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        <div class='input-group date datetimepicker'>
            <input data-date-format="YYYY-MM-DD" value="{{$patient->birthday}}" type='text' id="birthday" name="birthday" class="form-control" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
        </div>

    </div>
</div>
</fieldset>

<div class=" form-actions">
    <div class="form-group">
        <label class="col-sm-2 control-label">&nbsp;</label>

        <div class="col-sm-10">
            {{ Form::submit('Ενημέρωση', array('class' => 'btn btn-lg btn-primary')) }}
            {{ link_to_route('patients.show', 'Ακύρωση', $patient->id, array('class' => 'btn btn-lg btn-default')) }}
        </div>
    </div>
</div>




{{ Form::close() }}

@stop

@section("scripts")
<script type="text/javascript">
    $(document).ready(function(){
        $('.datetimepicker').datetimepicker({
            language:'el',
            pickTime: false
        });
    });


</script>
@stop