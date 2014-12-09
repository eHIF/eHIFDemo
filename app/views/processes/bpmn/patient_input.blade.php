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
    <script src="{{URL::asset('scripts/application/patientsearch/controller.js')}}"></script>
@stop

@section("content")

    <link rel="stylesheet" href="{{URL::asset('bower_resources/bootstrap-datepicker/css/datepicker.css')}}"/>


    <div ng-controller="PatientsSearchController">
        <form class="form-horizontal">
            <div class="form-group">
                <label for="search" class="col-md-3  control-label">Επίθετο ή ΑΜΚΑ:</label>
                <div class="col-sm-9">
                    <input ng-model="searchTerm" type="text" id="search" name="search"/>
                </div>
            </div>
            <div class="col-md-9">   <button ng-click="search()" class="btn btn-lg btn-default" type="submit">Αναζήτηση</button>
            </div>

        </form>
<span ng-if="results.length>0" >
  <table datatable="" dt-options="dtOptions" dt-columns="dtColumns" class="row-border hover">
      <thead>

      </thead>
      <tbody></tbody>
  </table>
</span>
    <span ng-if="results.length<1 && !isSearching" >
  Δεν υπάρχει καταχωρημένος επισκέπτης ασθενής με αυτά τα στοιχεία
</span>





        <form method="POST"  action="{{URL::route("$process.$taskName.complete",array("task_id"=>$taskId))}}" class="form form-horizontal">

            <div  ng-if="results.length>0">

                @foreach($form->formProperties as $field)
                    <div class=" form-actions">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="{{$field->id}}">{{$field->name}}</label>

                            <div class="col-sm-10">
                                @if($field->type== "enum")
                                    <select  @if($field->required) required @endif class="form-control" name="{{$field->id}}"
                                                                   id="{{$field->id}}">
                                        @foreach($field->enumValues as $enumValue)
                                            <option value="{{$enumValue->id}}">{{$enumValue->name}}</option>
                                        @endforeach
                                    </select>
                                @elseif($field->type== "string" || $field->type ==NULL)
                                    <input ng-model="selection.{{$field->id}}" name="{{$field->id}}" @if(!$field->writable) disabled @endif @if($field->required)
                                           required @endif value="{{$field->value}}" id="{{$field->id}}" type="text"
                                           class="form-control"/>
                                @elseif($field->type == "date")
                                    <input ng-model="selection.{{$field->id}}" name="{{$field->id}}" @if($field->required) required @endif  @if(!$field->writable)
                                           disabled @endif value="{{$field->value}}" id="{{$field->id}}"   type="text"
                                           class="datepicker form-control">
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach




            </div>


            <div ng-if="results.length<1  && !isSearching" >

                @foreach($form->formProperties as $field)
                    <div class=" form-actions">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="{{$field->id}}">{{$field->name}}</label>

                            <div class="col-sm-10">
                                @if($field->type== "enum")
                                    <select  @if($field->required) required @endif class="form-control" name="{{$field->id}}"
                                                                   id="{{$field->id}}">
                                        @foreach($field->enumValues as $enumValue)
                                            <option value="{{$enumValue->id}}">{{$enumValue->name}}</option>
                                        @endforeach
                                    </select>
                                @elseif($field->type== "string" || $field->type ==NULL)
                                    <input ng-model="selection.{{$field->id}}" name="{{$field->id}}" @if(!$field->writable) disabled @endif @if($field->required)
                                           required @endif value="{{$field->value}}" id="{{$field->id}}" type="text"
                                           class="form-control"/>
                                @elseif($field->type == "date")
                                    <input ng-model="selection.{{$field->id}}" name="{{$field->id}}" @if($field->required) required @endif  @if(!$field->writable)
                                           disabled @endif value="{{$field->value}}" id="{{$field->id}}"   type="text"
                                           class="datepicker form-control">
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach

             </div>
            <button type="submit">Επόμενο βήμα</button>
        </form>


    </div>



@stop