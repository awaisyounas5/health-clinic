@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('company.shift_note')}}">Notes</a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">View Notes</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-block">
                        <h6 class="card-title text-bold">View Notes By Patient</h6>
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="datatable table table-stripped dataTable no-footer"
                                            id="DataTables_Table_0" role="grid"
                                            aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc">#</th>
                                                    <th class="sorting_asc">Patient Name</th>
                                                    <th class="sorting">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($shift_notes as $patientId => $shift_note)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $shift_note->patient->name }}</td>
                                                    <td><a href="#" class="dropdown-toggle nav-link user-link"
                                                        data-bs-toggle="dropdown">
                                                        <span>Action</span>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{route('company.shift_note.view',$shift_note->patient_id)}}">View Entire Shift Notes</a>
                                                    </div>
                                                </td>
                                                </tr>
                                                @endforeach
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

    @endsection
