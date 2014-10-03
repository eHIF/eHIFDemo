@extends('layouts.default')

@section("pagetitle")
Visits
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
        <td> <div>{{$visit->patient->surname}}</div></td>
        <td> <div><a href="{{URL::to('sessions/create')}}">Έναρξη εξέτασης</a></div></td>
    </tr>

    @endif
    @endforeach


    </tbody>

</table>

@endsection