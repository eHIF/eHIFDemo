@extends('layouts.default')
@section('content')
<h1 class="page-header">Signup for an account</h1>


<form method="POST" action="{{{ URL::to('users/store/')}}}" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">


    <fieldset class="col-xs-6">
    <legend>Personal Information</legend>
        <div class="form-group">
            <label for="username">{{{ Lang::get('confide::confide.username') }}}</label>
            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" name="username" id="username" value="{{{ Input::old('username') }}}">
        </div>
        <div class="form-group">
            <label for="email">{{{ Lang::get('confide::confide.e_mail') }}} <small>{{ Lang::get('confide::confide.signup.confirmation_required') }}</small></label>
            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
        </div>
        <div class="form-group">
            <label for="password">{{{ Lang::get('confide::confide.password') }}}</label>
            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">{{{ Lang::get('confide::confide.password_confirmation') }}}</label>
            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
        </div>





</fieldset>

<fieldset class="col-xs-6">
<legend>Company Information</legend>
           <div class="form-group">
                    <label for="company"> Company name</label>
                    <input class="form-control" placeholder="Your company" type="text" name="company" id="company" value="{{{ Input::old('company') }}}">
                </div>
  <div class="form-group">
    <label for="country"> Country</label>
        <select data-live-search="true" class="form-control selectpicker" name="country" id="country">
        <option></option>
            @foreach (Country::all() as $country)

            <option value="{{$country->id}}"  >{{$country->name}}</option>

            @endforeach


        </select>
    </div>


                <div class="form-group">
                    <label for="vat"> Company VAT number</label>
                    <input class="form-control" placeholder="Your company's VAT registration number" type="text" name="vat" id="vat" value="{{{ Input::old('vat') }}}">
                </div>


<div class="form-group">
    <label for="activity">Company activity</label>
        <select multiple  class="form-control selectpicker" name="types[]" id="types">

            @foreach (CompanyType::all() as $companytype)

            <option value="{{$companytype->id}}"  >{{$companytype->name}}</option>

            @endforeach


        </select>
    </div>





    </fieldset>
 <div class="pull-right form-actions form-group row-fluid">
            <button type="submit" class="btn btn-lg btn-primary">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
        </div>
</form>
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


@stop