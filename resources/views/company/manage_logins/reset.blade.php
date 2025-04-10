@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Manage Logins</a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Reset Password</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-block">
                        <h6 class="card-title text-bold">Reset Password</h6>
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="datatable table table-stripped dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc">Sr#</th>
                                                    <th class="sorting">Username</th>
                                                    <th class="sorting">Role</th>
                                                    <th class="sorting">Created At</th>
                                                    <th class="sorting">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">1</td>
                                                    <td>johndoe</td>
                                                    <td>Admin</td>
                                                    <td>2024-05-24</td>
                                                    <td><a href="/manage_logins/reset-password" class="btn btn-primary">Reset Password</a></td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class="sorting_1">2</td>
                                                    <td>janedoe</td>
                                                    <td>User</td>
                                                    <td>2024-05-24</td>
                                                    <td><a href="/manage_logins/reset-password" class="btn btn-primary">Reset Password</a></td>
                                                </tr>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">3</td>
                                                    <td>mikesmith</td>
                                                    <td>Manager</td>
                                                    <td>2024-05-24</td>
                                                    <td><a href="/manage_logins/reset-password" class="btn btn-primary">Reset Password</a></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection