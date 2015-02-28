@extends('layouts.default')
@section('pagetitle')
Αποτελέσματα Συνεδρίας
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


<div class="col-sm-6">
    {{ Form::model($session, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('sessions.update', $session->id))) }}

    <div class="form-group">
        {{ Form::label('diagnosis', 'Διάγνωση:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::textarea('diagnosis', $session->diagnosis, Input::old('diagnosis'), array('class'=>'form-control')) }}
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2 control-label">&nbsp;</label>
        <div class="col-sm-10">
            {{ Form::submit('Αποθήκευση', array('class' => 'btn btn-lg btn-primary')) }}
            {{ link_to_route('sessions.show', 'Ακύρωση', $session->id, array('class' => 'btn btn-lg btn-default')) }}
        </div>
    </div>

    {{ Form::close() }}
</div>
<div class="col-sm-6">
    <div class="panel-group" id="accordion">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#exams">
                       Διαγνωστικές Εξετάσεις
                    </a>
                </h4>
            </div>
            <div id="exams" class="panel-collapse collapse">
                <div class="panel-body">

                    @include('sessions.referrals.aio')
                </div>
            </div>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#prescriptions">
                        Συνταγογράφηση φαρμάκων
                    </a>
                </h4>
            </div>
            <div id="prescriptions" class="panel-collapse collapse">
                <div class="panel-body">

                    @include('sessions.prescriptions.aio')
                </div>
            </div>
        </div>
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#therapy">
                        Θεραπευτικές Ενέργειες
                    </a>
                </h4>
            </div>
            <div id="therapy" class="panel-collapse collapse">
                <div class="panel-body">
                    @include('sessions.therapeutics.aio')
                </div>
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#hospitalization">
                        Νοσηλεία
                    </a>
                </h4>
            </div>
            <div id="hospitalization" class="panel-collapse collapse">
                <div class="panel-body">
                    @include('sessions.hospitalizations.aio')
                </div>
            </div>
        </div>


    </div>
</div>


@stop

