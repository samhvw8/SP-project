@extends('pages.dashboard.index')

@push('page_css')
<link href="{{ asset('/css/manage-users.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@push('page_js')
<script src="{{ asset('/js/manage-users.js') }}"></script>
@endpush

@section('dashboard_container')
    <div class="manage-users-container">
        <div class="user-table">
            <div class="row no-margin">
                <table>
                    <tbody>
                    <tr class="table-header">
                        <td align="left" width="300px">
                            Name
                        </td>
                        <td align="left" width="300px">
                            Email
                        </td>
                        <td align="left" width="200px">
                            Settings
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row no-margin">
                <table>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="table-header">

                            <td align="left" width="300px">
                                {{ $user->name }}
                            </td>
                            <td align="left" width="300px">
                                {{ $user->email }}
                            </td>
                            <td align="left" width="200px">
                                <div class="row">
                                    <a class="btn btn-warning col-xs-6" href="{{ route('users.edit', $user->id) }}">
                                        <span class="glyphicon glyphicon-pencil"></span><span>Update</span>

                                    </a>

                                    <a class="btn btn-danger delete-button col-xs-6" role="button"
                                       data-delete-link="{{ route('users.destroy', $user->id) }}" data-toggle="modal"
                                       data-target="#modal-delete">
                                        <span class="glyphicon glyphicon-remove"></span><span>Delete</span>
                                    </a>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-center">
            <ul class="pagination pagination-sm">
                <li><a href="#">First</a></li>
                <li><a href="#">Previous</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">Next</a></li>
                <li><a href="#">Last</a></li>
            </ul>
        </div>
        <!-- Modal -->
        @include('layouts.modal')
    </div>
@stop