@extends("layouts.default")

@section("pagetitle")
    {{$task->name}}
@stop

@section("scripts")
    <script src="{{URL::asset('bower_resources/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{URL::asset('bower_resources/angular-bootstrap-datetimepicker/src/js/datetimepicker.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('input.datepicker').datepicker({
                format: "dd-M-yyyy"
            });
        });
    </script>
    <script src="{{URL::asset('scripts/application/patientsearch/controller.js')}}"></script>


@stop

@section("content")

    <link rel="stylesheet"
          href="{{URL::asset('bower_resources/angular-bootstrap-datetimepicker/src/css/datetimepicker.css')}}"/>


    <div ng-controller="PatientsSearchController">
        <form class="form-horizontal">


            <div class="row">


                <div class="col-lg-6">
                    <div class="input-group">
                        <input class="form-control" ng-model="searchTerm" type="text" id="search" name="search"
                               placeholder="Ονοματεπώνυμο ή ΑΜΚΑ"/>
                          <span class="input-group-btn">
                            <button ng-click="search()" class="btn btn-default" type="submit">Αναζήτηση</button>
                          </span>
                    </div>
                    <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->


        </form>
<span ng-if="results.length>0">
  <table datatable="" dt-options="dtOptions" dt-columns="dtColumns" class="row-border hover">
      <thead>

      </thead>
      <tbody></tbody>
  </table>
</span>
    <span ng-if="results.length<1 && !isSearching">
  Δεν υπάρχει καταχωρημένος επισκέπτης ασθενής με αυτά τα στοιχεία
</span>


        <form method="POST" action="{{URL::route("$process.$taskName.complete",array("task_id"=>$taskId))}}"
              class="form form-horizontal col-sm-12">

            <div ng-if="results.length>0">

                @foreach($form->formProperties as $field)
                    <div class=" form-actions">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="{{$field->id}}">{{$field->name}}</label>

                            <div class="col-sm-10">

                                @if($field->type== "enum")
                                    <select  @if($field->required) required @endif class="form-control"
                                                                   name="{{$field->id}}"
                                                                   id="{{$field->id}}">
                                        @foreach($field->enumValues as $enumValue)
                                            <option value="{{$enumValue->id}}">{{$enumValue->name}}</option>
                                        @endforeach
                                    </select>
                                @elseif($field->type== "string" || $field->type ==NULL)
                                    <input ng-model="selection.{{$field->id}}"
                                    @if($field->id=="amka")
                                           pattern="[0-9]{11}"
                                           @endif
                                           name="{{$field->id}}" @if(!$field->writable)
                                           disabled @endif @if($field->required)
                                           required @endif value="{{$field->value}}" id="{{$field->id}}" type="text"
                                           class="form-control"/>
                                @elseif($field->type == "date")

                                    <div class="dropdown">
                                        <a class="dropdown-toggle" id="dropdown2" role="button" data-toggle="dropdown"
                                           data-target="#" href="#">
                                            <div class="input-group">
                                                <input class="form-control" type="text" ng-value="date | date:'yyyy-MM-dd HH:mm'"  name="{{$field->id}}" @if($field->required)

                                                       required @endif


                                                @if(!$field->writable)
                                                       disabled @endif value="{{$field->value}}"
                                                       id="{{$field->id}}"   >
                                                <span
                                                        class="input-group-addon"><i
                                                            class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                        </a>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">

                                            <datetimepicker data-ng-model="date"
                                                            data-datetimepicker-config="{ dropdownSelector: '#dropdown2' }"/>
                                        </ul>
                                    </div>







                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach


            </div>


            <div ng-if="results.length<1  && !isSearching">

                @foreach($form->formProperties as $field)
                    <div class=" form-actions">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="{{$field->id}}">{{$field->name}}</label>

                            <div class="col-sm-10">
                                @if($field->type== "enum")
                                    <select  @if($field->required) required @endif class="form-control"
                                                                   name="{{$field->id}}"
                                                                   id="{{$field->id}}">
                                        @foreach($field->enumValues as $enumValue)
                                            <option value="{{$enumValue->id}}">{{$enumValue->name}}</option>
                                        @endforeach
                                    </select>
                                @elseif($field->type== "string" || $field->type ==NULL)
                                    <input ng-model="selection.{{$field->id}}"

                                           @if($field->id=="amka")
                                           pattern="[0-9]{11}"
                                           @endif


                                           name="{{$field->id}}" @if(!$field->writable)
                                           disabled @endif @if($field->required)
                                           required @endif value="{{$field->value}}" id="{{$field->id}}" type="text"
                                           class="form-control"/>
                                @elseif($field->type == "date")
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" id="dropdown2" role="button" data-toggle="dropdown"
                                           data-target="#" href="#">
                                            <div class="input-group">
                                                <input class="form-control" type="text" ng-value="date | date:'yyyy-MM-dd HH:mm'"  name="{{$field->id}}" @if($field->required)
                                                       required @endif  @if(!$field->writable)
                                                       disabled @endif value="{{$field->value}}"
                                                       id="{{$field->id}}"   >
                                                <span
                                                        class="input-group-addon"><i
                                                            class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                        </a>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">

                                            <datetimepicker data-ng-model="date"
                                                            data-datetimepicker-config="{ dropdownSelector: '#dropdown2' }"/>
                                        </ul>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="pull-right">
                <button class="btn btn-primary btn-lg" type="submit">Επόμενο βήμα</button>
            </div>
        </form>


    </div>



@stop