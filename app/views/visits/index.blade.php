@extends('layouts.default')


@section("content")

@foreach($visits as $visit)
@if(isset($visit->patient))
<div>{{$visit->patient->surname}}</div>
@endif
@endforeach
@endsection