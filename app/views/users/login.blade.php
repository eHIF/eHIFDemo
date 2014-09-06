@extends('layouts.default')
@section('content')
<h1 class="page-header">Login</h1>

<link rel="stylesheet" type="text/css" href="{{ URL::asset('bower_resources/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox
.css') }}"/>

<form method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8" role="form">
    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
    <fieldset>
        <div class="form-group">
            <label for="email">{{{ Lang::get('confide::confide.username_e_mail') }}}</label>
            <input class="form-control" tabindex="1" placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
        </div>
        <div class="form-group">
        <label for="password">
            {{{ Lang::get('confide::confide.password') }}}
            <small>
                <a href="{{{ URL::to('/users/forgot_password') }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a>
            </small>
        </label>
        <input class="form-control" tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
        </div>
        <div class="form-group">
            <div class="checkbox checkbox-primary">
                <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
                <label for="remember" class="checkbox">{{{ Lang::get('confide::confide.login.remember') }}}

                </label>
            </div>

        </div>
        @if (Session::get('error'))
            <div class="alert alert-danger">{{{ Session::get('error') }}}</div>
        @endif

        @if (Session::get('notice'))
            <div class="alert">{{{ Session::get('notice') }}}</div>
        @endif
        <div class="form-group">
            <button tabindex="3" type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.login.submit')
                }}}</button>
        </div>
    </fieldset>
</form>
@stop