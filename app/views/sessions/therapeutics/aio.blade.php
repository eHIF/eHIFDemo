@section('scripts')
<script>
    session = {{$session->id}};
    patient = {{$session->patient->id}};
    doctor = {{$session->doctor->id}};
</script>
<script src="{{ URL::asset('scripts/application/therapeutics/controller.js')}}"></script>
@append

<div ng-controller="TherapeuticsController">
<h3>Θεραπευτικές Ενέργειες</h3>
  <table datatable="ng" dt-options="dtOptions" dt-column-defs="dtColumnDefs" class="row-border hover">
      <thead>
      <th>Τύπος Θεραπείας</th>
      <th>Σχόλια</th>

      <th></th>
      </thead>
      <tbody>
      <tr ng-repeat="therapeutic in therapeutics">
          <td>[[ therapeutic.therapeutic_type.name ]]</td>
          <td>[[ therapeutic.comments ]]</td>
          <td>

              <button type="button" ng-click="removeTherapeutic($index)" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
          </td>
      </tr>
      </tbody>
  </table>
<hr/>
    <form class="form form-horizontal">
        <fieldset>
            <legend>Προσθήκη θεραπείας</legend>
        </fieldset>
        <div class="form-group">
            {{ Form::label('therapeutic_type', 'Τύπος παραπεμπτικού:', array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                <select ng-model="newTherapeutic.therapeutic_type_id" ng-options="therapeutic_type.id as therapeutic_type.name for therapeutic_type in therapeuticTypes"></select>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('comments', 'Σχόλια: ', array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                <textarea ng-model="newTherapeutic.comments" name="comments" id="comments"></textarea>
            </div>
        </div>

<div class="form-group">
    <label class="col-sm-4 control-label">&nbsp;</label>
    <div class="col-sm-8">

        <button ng-click="addTherapeutic()" class="btn btn-primary">Προσθήκη</button>

        <div class="row"><a target="_blank" href="http://www.e-syntagografisi.gr/">Ηλεκτρονική Συνταγογράφηση</a></div>
    </div>
</div>

       </form>

</div>