@extends('layouts.default')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('bower_resources/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox
.css') }}"/>

<h1 class="page-header">Are you sure you want to cancel your account?</h1>


<form class="form-horizontal" method="post" action="{{URL::to('/users/dodelete/').'/'.$user->username}}">
    <fieldset>
        <legend><h3>We are very sorry to see you go!</h3>
            Before you switch off the lights, please provide us with the reason you are cancelling your account.</legend>
        <div class="form-group">
            <label class="col-xs-3 control-label">I 'm leaving because...</label>
            <div class="col-xs-9">
                <div class="radio radio-primary">
                    <input id="betterservice" name="reason" value="betterservice" type="radio">
                    <label for="betterservice">I found a better service elsewhere</label>
                </div>
                <div class="radio radio-primary">
                    <input id="outofbusiness" name="reason" value="outofbusiness" type="radio">
                    <label for="outofbusiness">

                        I am not into that business anymore</label>
                </div>
                <div class="radio radio-primary">
                    <input id="dissapointed" name="reason" value="dissapointed" type="radio">
                    <label for="dissapointed">

                        I am disappointed by the service.</label>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">

            <a href="{{URL::to('/')}}" class="btn btn-success">Cancel and go back</a>

            <?php
            echo Form::submit('Delete', array("class" => "btn btn-danger"));
            ?>
        </div>
    </div>



</form>






@stop