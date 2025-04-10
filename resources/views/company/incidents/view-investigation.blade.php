@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('company.incidents.view_investigations') }}">Investigation Reports </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">View Investigation Report</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="card-title">Investigation Report Details</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Date:</strong> {{ $report->investigation_date }}</p>
                            <p><strong>Time:</strong> {{ $report->investigation_time }}</p>
                            <p><strong>People Involved:</strong> {{ $report->people_involved }}</p>
                            <p><strong>Position of Investigator:</strong> {{ $report->position_of_investigator }}</p>
                            <p><strong>Location:</strong> {{ $report->location }}</p>
                            <p><strong>Name of Investigator:</strong> {{ $report->name_of_investigator }}</p>
                            <p><strong>Incident Details:</strong> {{ $report->incident_details }}</p>
                            <p><strong>Result Of Investigation:</strong> {{ $report->result_of_investigation }}</p>
                            <p><strong>Recommendations:</strong> {{ $report->recommendation }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
