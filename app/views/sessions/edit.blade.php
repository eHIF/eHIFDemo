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
            {{ Form::textarea('diagnosis', '', Input::old('id'), array('class'=>'form-control')) }}
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
        <div class="panel panel-default">
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
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#perscription">
                        Φαρμακευτική Αγωγή
                    </a>
                </h4>
            </div>
            <div id="perscription" class="panel-collapse collapse">
                <div class="panel-body">
                    <button class="btn btn-primary">Προσθήκη</button>

                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#therapy">
                        Θεραπευτικές Ενέργειες
                    </a>
                </h4>
            </div>
            <div id="therapy" class="panel-collapse collapse">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#hospitalization">
                        Νοσηλεία
                    </a>
                </h4>
            </div>
            <div id="hospitalization" class="panel-collapse collapse">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>


    </div>
</div>


@stop

