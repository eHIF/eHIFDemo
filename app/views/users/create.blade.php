@extends('layouts.default')
@section('content')
<h1 class="page-header">Create an account</h1>

<form method="POST" action="{{{ (action('UsersController@adminstore')) ?: URL::to('user')  }}}" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
    <fieldset>
        <div class="form-group">
            <label for="username">{{{ Lang::get('confide::confide.username') }}}</label>
            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" name="username" id="username" value="{{{ Input::old('username') }}}">
        </div>
        <div class="form-group">
            <label for="email">{{{ Lang::get('confide::confide.e_mail') }}} <small>{{ Lang::get('confide::confide.signup.confirmation_required') }}</small></label>
            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
        </div>


        <div class="form-group">

                <select class="selectpicker" name="role">
                    @foreach (Role::all() as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>

                    @endforeach


                </select>




        </div>


        @if ( Session::get('error') )
        <div class="alert alert-danger alert-danger">
            @if ( is_array(Session::get('error')) )
            {{ head(Session::get('error')) }}
            @endif
        </div>
        @endif

        @if ( Session::get('notice') )
        <div class="alert">{{ Session::get('notice') }}</div>
        @endif
        <div class="form-actions form-group">
            <button type="submit" class="btn btn-success">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
        </div>
    </fieldset>
</form>




@stop