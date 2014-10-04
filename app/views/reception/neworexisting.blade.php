@extends('layouts.default')


@section("scripts")
<script src="{{URL::asset('scripts/application/patientsearch/controller.js')}}"></script>
@endsection


@section('pagetitle')
Αναζήτηση ασθενούς
@endsection

@section('content')




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





    <form class="form-horizontal">

        <div  ng-if="results.length>0">
            <div class="form-group">
                <label for="name" class="col-md-3  control-label">Όνομα</label>
                <div class="col-sm-9">
                    <input ng-model="selection.name" type="text" id="name" name="name"/>
                </div>
            </div>


            <div class="form-group">
                <label for="surname" class="col-md-3  control-label">Επίθετο</label>
                <div class="col-sm-9">
                    <input ng-model="selection.surname" type="text" id="surname" name="surname"/>
                </div>
            </div>
            <div class="form-group">
                <label for="amka" class="col-md-3  control-label">ΑΜΚΑ</label>
                <div class="col-sm-9">
                    <input ng-model="selection.amka" type="text" id="amka" name="amka"/>
                </div>
            </div>
            <button ng-if="selection.amka"  ng-click="saveAndContinue()" class="btn btn-lg btn-default" >Συνέχεια</button>


        </div>


    <div ng-if="results.length<1  && !isSearching" >
        <div class="form-group">
            <label for="name" class="col-md-3  control-label">Όνομα</label>
            <div class="col-sm-9">
                <input ng-model="newvisitor.name" type="text" id="name" name="name"/>
            </div>
        </div>


        <div class="form-group">
            <label for="surname" class="col-md-3  control-label">Επίθετο</label>
            <div class="col-sm-9">
                <input ng-model="newvisitor.surname" type="text" id="surname" name="surname"/>
            </div>
        </div>

        <div class="form-group">
            <label for="amka" class="col-md-3  control-label">ΑΜΚΑ</label>
            <div class="col-sm-9">
                <input ng-model="newvisitor.amka" type="text" id="amka" name="amka"/>
            </div>
        </div>

     <button class="btn btn-lg btn-default" ng-click="newAndContinue()" >Πρώτη Επίσκεψη</button>
    </div>

    </form>


</div>

@endsection