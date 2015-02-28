@section('scripts')
    <script>
        session = {{$session->id}};
        patient = {{$session->patient->id}};
        doctor = {{$session->doctor->id}};
    </script>
    <script src="{{ URL::asset('scripts/application/hospitalizations/controller.js')}}"></script>
@append

<div ng-controller="HospitalizationsController">
    <h3>Νοσηλεία</h3>
    <table datatable="ng" dt-options="dtOptions" dt-column-defs="dtColumnDefs" class="row-border hover">
        <thead>
        <th>Διάρκεια</th>
        <th>Σχόλια</th>

        <th></th>
        </thead>
        <tbody>
        <tr ng-repeat="hospitalization in hospitalizations">
            <td>[[ hospitalization.duration ]]</td>
            <td>[[ hospitalization.comments ]]</td>
            <td>

                <button type="button" ng-click="removeHospitalization($index)" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
            </td>
        </tr>
        </tbody>
    </table>
    <hr/>
    <form class="form form-horizontal">
        <fieldset>
            <legend>Προσθήκη νοσηλείας</legend>
        </fieldset>

        <div class="form-group">
            {{ Form::label('duration', 'Διάρκεια: ', array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                <input ng-model="newHospitalization.duration" name="duration" id="duration"/>
            </div>
        </div>


        <div class="form-group">
            {{ Form::label('comments', 'Σχόλια: ', array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                <textarea ng-model="newHospitalization.comments" name="comments" id="comments"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 control-label">&nbsp;</label>
            <div class="col-sm-8">

                <button ng-click="addHospitalization()" class="btn btn-primary">Προσθήκη</button>

                <div class="row"><a target="_blank" href="http://www.e-syntagografisi.gr/">Ηλεκτρονική Συνταγογράφηση</a></div>
            </div>
        </div>

    </form>

</div>