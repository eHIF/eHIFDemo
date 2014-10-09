@extends('layouts.default')

@section("pagetitle")
Επισκέψεις
@endsection
@section("content")
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <td>Ασθενής</td>
        <td>Ενέργειες</td>
    </tr>
    </thead>
    <tbody>
    @foreach($visits as $visit)
    @if(isset($visit->patient))
    <tr>
        <td> <div>{{$visit->patient->name}} {{$visit->patient->surname}}</div></td>
        <td> <div><a href="{{URL::route('sessions.create',array("visit"=>$visit->id))}}">Έναρξη εξέτασης</a></div></td>
    </tr>

    @endif
    @endforeach


    </tbody>

</table>

@endsection