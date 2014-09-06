@extends('layouts.default')
@section('content')
<form method="POST" action="{{ URL::to('/users/forgot_password') }}" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

    <div class="form-group">
        <label style="display: none" for="email">{{{ Lang::get('confide::confide.e_mail') }}}</label>
        <div class="input-append input-group">
            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="hidden" name="email" id="email" value="{{{$email}}}">
            <span class="input-group-btn">
                <input class="btn btn-lg btn-default" type="submit" value="Send Password Reset mail">
            </span>
        </div>
    </div>

    @if (Session::get('error'))
        <div class="alert alert-danger alert-danger">{{{ Session::get('error') }}}</div>
    @endif

    @if (Session::get('notice'))
        <div class="alert">{{{ Session::get('notice') }}}</div>
    @endif
</form>
@stop