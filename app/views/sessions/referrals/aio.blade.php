@section('scripts')
<script>
    session = {{$session->id}};
    patient = {{$session->patient->id}};
    doctor = {{$session->doctor->id}};
</script>
<script src="{{ URL::asset('scripts/application/referrals/controller.js')}}"></script>
@append

<div ng-controller="ReferralsController">

  <table datatable="ng" dt-options="dtOptions" dt-column-defs="dtColumnDefs" class="row-border hover">
      <thead>
      <th>Τύπος Εξέτασης</th>
      <th>Σχόλια</th>

      <th></th>
      </thead>
      <tbody>
      <tr ng-repeat="referral in referrals">
          <td>[[ referral.referral_type.name ]]</td>
          <td>[[ referral.comments ]]</td>
          <td>

              <button type="button" ng-click="removeReferral($index)" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
          </td>
      </tr>
      </tbody>
  </table>

    <form class="form form-horizontal">

        <div class="form-group">
            {{ Form::label('referral_type', 'Τύπος παραπεμπτικού:', array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                <select ng-model="newReferral.referral_type_id" ng-options="referral_type.id as referral_type.name for referral_type in referralTypes"></select>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('comments', 'Σχόλια: ', array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                <textarea ng-model="newReferral.comments" name="comments" id="comments"></textarea>
            </div>
        </div>



        <button ng-click="addReferral()" class="btn btn-primary">Προσθήκη</button>
    </form>

</div>