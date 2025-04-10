@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.observation')}}">Observations </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">View Observations</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-block">
                        <h6 class="card-title text-bold">View Observations By Patient</h6>
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
                                                @foreach($observations as $patientId => $patientObservation)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $patientObservation->first()->patient->name }}</td>
                                                    <td>
                                                        <a class="btn btn-primary" href="{{ route('manager.observation.view', $patientId) }}">View Entire Observations List</a>
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
