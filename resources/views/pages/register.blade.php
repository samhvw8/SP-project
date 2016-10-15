@extends('layouts.base_layout')

@push('page_css')
<link href="{{ asset('/css/login.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('body_container')
    <div class="login-container">
        <div class="login-title">
            Register
        </div>
        <div class="form-container">
            <div class="row no-margin">
                <label class="col-xs-4" for="email">First name:</label>
                <input class="col-xs-8" type="email" id="email">
            </div>
            <div class="row no-margin">
                <label class="col-xs-4" for="email">Last name:</label>
                <input class="col-xs-8" type="email" id="email">
            </div>
            <div class="row no-margin">
                <label class="col-xs-4" for="email">Email address:</label>
                <input class="col-xs-8" type="email" id="email">
            </div>
            <div class="row no-margin">
                <label class="col-xs-4" for="email">Password:</label>
                <input class="col-xs-8" type="password" id="password">
            </div>
            <div class="row no-margin">
                <label class="col-xs-4" for="email">Confirm password:</label>
                <input class="col-xs-8" type="password" id="password">
            </div>
            <div class="row no-margin center-button-container">
                <button class="login-button">
                    Register
                </button>
            </div>
        </div>
    </div>
@stop