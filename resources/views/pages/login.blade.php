@extends('layouts.base_layout')

@push('page_css')
<link href="{{ asset('/css/login.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('body_container')
    <form method="post" action="{{ route('auth.login') }}">
        {{ csrf_field() }}
        <div class="login-container">
            <div class="login-title">
                Login
            </div>
            <div class="form-container">
                @if(Session::has('errors'))
                        <p class="err-message">{{ Session::get('errors') }}</p>
                @endif
                <div class="row no-margin">
                    <label class="col-xs-4" for="email">Email address:</label>
                    <input class="col-xs-8" type="email" id="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="row no-margin">
                    <label class="col-xs-4" for="email">Password:</label>
                    <input class="col-xs-8" type="password" id="password" name="password">
                </div>
                <div class="row no-margin center-button-container">
                    <button class="login-button" type="submit">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </form>
@stop