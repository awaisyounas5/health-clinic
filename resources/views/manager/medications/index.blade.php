@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('manager.medications') }}">Medications</a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">View All Medications</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-block">
                        <h6 class="card-title text-bold">View Medications By Patient</h6>
                        <div class="table-responsive">
                            <table class="datatable table table-stripped dataTable no-footer">
                                <thead>
                                    <tr role="row">
                                        <th>#</th>
                                        <th>Patient Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($medications as $patientId => $patientMedications)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $patientMedications->first()->patient->name }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('manager.medications.view', $patientId) }}">View Entire Medications</a>
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
@endsection
