@section('scripts')
    <script>
        session = {{$session->id}};
        patient = {{$session->patient->id}};
        doctor = {{$session->doctor->id}};
    </script>
    <script src="{{ URL::asset('scripts/application/prescriptions/controller.js')}}"></script>
@append

<div ng-controller="PrescriptionsController">
    <h3>Συνταγογράφηση Φαρμάκων</h3>
    <table datatable="ng" dt-options="dtOptions" dt-column-defs="dtColumnDefs" class="row-border hover">
        <thead>
        <th>Δραστική Ουσία</th>
        <th>Δοσολογία</th>
        <th>Σχόλια</th>

        <th></th>
        </thead>
        <tbody>
        <tr ng-repeat="prescription in prescriptions">
            <td>[[ prescription.substance ]]</td>
            <td>[[ prescription.dosage ]]</td>
            <td>[[ prescription.comments ]]</td>
            <td>

                <button type="button" ng-click="removePrescription($index)" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
            </td>
        </tr>
        </tbody>
    </table>
    <hr/>
    <form class="form form-horizontal">
        <fieldset>
            <legend>Προσθήκη φαρμάκου</legend>
        </fieldset>

        <div class="form-group">
            {{ Form::label('substance', 'Δραστική ουσία: ', array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                <input ng-model="newPrescription.substance" name="substance" id="substance"/>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('dosage', 'Δοσολογία: ', array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                <input ng-model="newPrescription.dosage" name="dosage" id="dosage"/>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('comments', 'Σχόλια: ', array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                <textarea ng-model="newPrescription.comments" name="comments" id="comments"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 control-label">&nbsp;</label>
            <div class="col-sm-8">

                <button ng-click="addPrescription()" class="btn btn-primary">Προσθήκη</button>

                <div class="row"><a target="_blank" href="http://www.e-syntagografisi.gr/">Ηλεκτρονική Συνταγογράφηση</a></div>
            </div>
        </div>

    </form>

</div>