@extends("layouts.default")

@section("pagetitle")
    {{$task->name}}
@stop

@section("scripts")
    <script src="{{URL::asset('bower_resources/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('input.datepicker').datepicker({
                format: "dd-M-yyyy"
            });
        });
    </script>

    <script src="{{URL::asset('bower_resources/chosen/chosen.jquery.js')}}"></script>
    <script src="{{URL::asset('scripts/application/medicalfindings/controller.js')}}"></script>

@stop

@section("content")

    <link rel="stylesheet" href="{{URL::asset('bower_resources/bootstrap-datepicker/css/datepicker.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('bower_resources/chosen/chosen.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('bower_resources/angular-chosen-localytics/chosen-spinner.css')}}"/>

<div  ng-controller="MedicalFindingsController">



    <form method="POST" ng-submit="submit()" action="{{URL::route("$process.$taskName.complete",array("task_id"=>$taskId))}}"
          class="form form-horizontal col-sm-12">
        <div>
                <input id="eyrimata" name="eyrimata"  type="hidden" ng-model="diseasesText" />

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="eyrimata_sel">Ευρήματα</label>

                        <div class="col-sm-10" ng-keyup="alert($event)"  tabindex="1">
                            <select chosen multiple id="eyrimata_sel" name="eyrimata_sel" class="form-control"
                                    ng-model="selectedDiseases"
                                    ng-options="item as (item.title + ' [' + item.code+ ']') for item in diseases"
                                    >

                            </select>

                        </div>
                    </div>


        </div>

        <div class="pull-right">
            <button class="btn btn-primary btn-lg" type="submit">Επόμενο βήμα</button>
        </div>
    </form>
</div>

@endsection
