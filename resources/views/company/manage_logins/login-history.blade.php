@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('company.manage.login-history')}}">Manage Logins</a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">View Login History</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-block">
                        <h6 class="card-title text-bold">Login History</h6>
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="datatable table table-stripped dataTable no-footer"
                                            id="DataTables_Table_0" role="grid"
                                            aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc">Sr#</th>
                                                    <th class="sorting">Username/Name</th>
                                                    <th class="sorting">Status</th>
                                                    <th class="sorting">Access Type</th>
                                                    <th class="sorting">Date</th>
                                                    <th class="sorting">Time</th>
                                                    <th class="sorting">View on Map</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($logged_in_users)
                                                @foreach ($logged_in_users as $logged_in_user)


                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{$loop->iteration}}</td>
                                                    <td>{{$logged_in_user->name}}</td>
                                                    <td>Success</td>
                                                    <td>{{$logged_in_user->login_status}}</td>
                                                    <td>{{ \Carbon\Carbon::parse($logged_in_user->updated_at)->format('Y-m-d') }}</td>
                                                    <td>14:55</td>
                                                    <td><a href="https://www.google.com/maps?q={{ $logged_in_user->latitude }},{{ $logged_in_user->longitude }}"target="_blank" class="btn btn-primary">View on Map</a></td>
                                                </tr>
                                                @endforeach
                                                @endif
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
