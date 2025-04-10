@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('manager.incidents.view_reports') }}">Shift Notes </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">View Shift Notes</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-block">
                        <h6 class="card-title text-bold">Shift Notes</h6>
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="datatable table table-stripped dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Patient </th>
                                                    <th>Shift Start Time</th>
                                                    <th>Shift End Time</th>
                                                    <th>Shift Start Date</th>
                                                    <th>Shift End Date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($shifts)
                                                @foreach ($shifts as $shift)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$shift->patient->name}}</td>
                                                    <td>{{$shift->shift_type->start_time}}</td>
                                                    <td>{{$shift->shift_type->end_time}}</td>
                                                    <td>{{$shift->start_date}}</td>
                                                    <td>{{$shift->end_date}}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle nav-link user-link" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <span>Action</span>
                                                            </a>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <li><a class="dropdown-item" href="{{ route('manager.shift_note.view_details', $shift->id) }}">View</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
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
