@extends('layouts.base_layout')

@push('page_css')
    <link href="{{ asset('/css/dashboard.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('body_container')
    <div class="row dashboard-content">
        <div class="col-xs-3 left-menu">
            <ul>
                <li>Users</li>
                <li>Orders</li>
            </ul>
        </div>
        <div class="col-xs-9">
            @section("dashboard_container")
            @show
        </div>
    </div>
@stop