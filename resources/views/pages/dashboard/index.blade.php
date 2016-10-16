@extends('layouts.base_layout')

@push('page_css')
<link href="{{ asset('/css/dashboard.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('body_container')
    <div class="row dashboard-content">
        <div class="col-xs-3 left-menu">

            <div class="row no-marginr">

                <a href="{{ route('users.index') }}">Users</a>

            </div>

            <div class="row no-marginr">
                <a href="{{ route('pages.under_construction') }}">Orders</a>

            </div>

        </div>
        <div class="col-xs-9">
            @section("dashboard_container")
            @show
        </div>
    </div>
@stop