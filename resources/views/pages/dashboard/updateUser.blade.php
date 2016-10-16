@extends('pages.dashboard.index')

@push('page_css')
<link href="{{ asset('/css/login.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/css/manage-users.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/css/update-user.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@push('page_js')
<script src="{{ asset('/js/manage-users.js') }}"></script>
@endpush

@section('dashboard_container')
    <form method="post" action="{{ route( 'users.update', $user->id) }}">
        {{ csrf_field() }}

        {{ method_field('PUT') }}

        {{--<div class="error-message">--}}
        {{--Requested user not found--}}
        {{--</div>--}}

        <div class="login-container">
            <div class="login-title">
                Update user's information"
            </div>
            <div class="form-container">
                <div class="row no-margin">
                    <label class="col-xs-4" for="name">Name:</label>
                    <input class="col-xs-8" type="text" id="name" name="name"
                           value="{{  $user->name  }}">
                </div>
                <div class="row no-margin">
                    <label class="col-xs-4" for="password">New password:</label>
                    <input class="col-xs-8" type="password" id="password" name="password">
                </div>
                <div class="row no-margin">
                    <label class="col-xs-4" for="password_confirmation">Confirm New password:</label>
                    <input class="col-xs-8" type="password" id="password_confirmation" name="password_confirmation">
                </div>
                <div class="row no-margin">
                    <label class="col-xs-4">Role:</label>
                    <input type="checkbox" id="is_admin" name="is_admin"
                           value="admin" {{ $user->is_admin ? 'checked' : '' }}>
                    <label for="is_admin">Admin</label>
                </div>
                <div class="row no-margin center-button-container">
                    <button class="login-button" type="submit">
                        Update
                    </button>
                    <button class="login-button cancel-button">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </form>
@stop