@extends('layouts.base_layout')

@push('page_css')
    <link href="{{ asset('/css/manage-users.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@push('page_js')
    <script src="{{ asset('/js/manage-users.js') }}"></script>
@endpush

@section('body_container')
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
                    <tr class="table-header">
                        <td align="left" width="300px">
                            Luong
                        </td>
                        <td align="left" width="300px">
                            luong@luong.com
                        </td>
                        <td align="left" width="200px">
                            <div class="row">
                                <a class="col-xs-6">
                                    <span class="glyphicon glyphicon-pencil"></span><span>Update</span>
                                </a>
                                <a class="col-xs-6 trigger-delete-modal" data-user-id="1">
                                    <span class="glyphicon glyphicon-remove"></span><span>Delete</span>
                                </a>
                            </div>
                        </td>
                    </tr>
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
        <div class="modal fade" id="confirmDeleteModal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Confirmation</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure to delete?</p>
                    </div>
                    <div class="modal-footer">
                        <button id="accept-delete-button" type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop