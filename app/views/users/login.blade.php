@extends('layouts.default')
@section('pagetitle')
Σύνδεση χρήστη
@endsection
@section('content')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('bower_resources/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox
.css') }}"/>

<form method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8" role="form">
    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
    <fieldset>
        <div class="form-group">
            <label for="email">Όνομα χρήστη / email</label>
            <input class="form-control" tabindex="1" placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
        </div>
        <div class="form-group">
        <label for="password">
            Κωδικός πρόσβασης
            <small>
                <a href="{{{ URL::to('/users/forgot_password') }}}">Ξέχασα τον κωδικό πρόσβασης</a>
            </small>
        </label>
        <input class="form-control" tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
        </div>
        <div class="form-group">
            <div class="checkbox checkbox-primary">
                <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
                <label for="remember" class="checkbox">Να παραμείνω σε σύνδεση

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
            <button tabindex="3" type="submit" class="btn btn-primary">Σύνδεση</button>
        </div>
    </fieldset>
</form>
@stop