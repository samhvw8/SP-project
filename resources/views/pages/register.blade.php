@extends('layouts.base_layout')

@push('page_css')
<link href="{{ asset('/css/login.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('body_container')
    <form method="post" action="{{ route('auth.register') }}">
        {{ csrf_field() }}
        <div class="login-container">
            <div class="login-title">
                Register
            </div>
            <div class="form-container">
                @if(Session::has('errors'))
                    @foreach(Session::get('errors') as $error)
                        <p class="err-message">{{ $error }}</p>
                    @endforeach
                @endif
                <div class="row no-margin">
                    <label class="col-xs-4" for="name">Name:</label>
                    <input class="col-xs-8" type="text" id="name" name="name" value="{{ old('name') }}">
                </div>
                <div class="row no-margin">
                    <label class="col-xs-4" for="email">Email address:</label>
                    <input class="col-xs-8" type="email" id="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="row no-margin">
                    <label class="col-xs-4" for="password">Password:</label>
                    <input class="col-xs-8" type="password" id="password" name="password">
                </div>
                <div class="row no-margin">
                    <label class="col-xs-4" for="password_confirmation">Confirm password:</label>
                    <input class="col-xs-8" type="password" id="password_confirmation" name="password_confirmation">
                </div>
                <div class="row no-margin center-button-container">
                    <button class="login-button" type="submit">
                        Register
                    </button>
                </div>
            </div>
        </div>
    </form>
@stop