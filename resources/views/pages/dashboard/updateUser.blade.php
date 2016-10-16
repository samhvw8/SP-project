@extends('pages.dashboard.index')

@push('page_css')
<link href="{{ asset('/css/manage-users.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@push('page_js')
<script src="{{ asset('/js/manage-users.js') }}"></script>
@endpush

@section('dashboard_container')


@stop