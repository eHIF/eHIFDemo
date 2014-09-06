@extends('layouts.default')
@section('content')
<div class="page-header">
    <h1>{{{$user->name}}} {{{$user->surname}}} ({{{$user->username}}})</h1>
    <div class="btn-group pull-right">
        <a class="btn btn-default" href="{{{URL::to('users/edit/'.$user->username)}}}"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
        <a class="btn btn-default" href="{{{URL::to('users/list/')}}}"><span class="glyphicon
        glyphicon-th-list"></span> List Users</a>
    </div>

</div>


<div class="row-fluid">
    <div>
        {{{$user->name}}}
    </div>
</div>
<div class="row-fluid">
    <div>
        {{{$user->surname}}}
    </div>
</div>
<div class="row-fluid">
    <div>
        {{{$user->phone}}}
    </div>
</div>
<div class="row-fluid">
    <div>
        {{{$user->address}}}
    </div>
</div>


<img src="<?= URL::to($user->avatar->url('medium')) ?>" >

@stop