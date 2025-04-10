@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('company.incidents.view_reports') }}">Incident Reports </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">View Incident Report</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="card-title">Incident Report Details</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Date:</strong> {{ $report->incident_date }}</p>
                            <p><strong>Time:</strong> {{ $report->incident_time }}</p>
                            <p><strong>People Involved:</strong> {{ $report->incident_people }}</p>
                            <p><strong>Position of Reporter:</strong> {{ $report->position_of_reporter }}</p>
                            <p><strong>Location:</strong> {{ $report->location }}</p>
                            <p><strong>Name of Reporter:</strong> {{ $report->name_of_reporter }}</p>
                            <p><strong>Incident Details:</strong> {{ $report->incident_details }}</p>
                            <p><strong>Severity of Incidents:</strong> {{ $report->severity_incident }}</p>
                            <p><strong>Type of Incidents:</strong> {{ $report->type_of_incident }}</p>
                            <p><strong>Possible Trigger:</strong> {{ $report->possible_trigger }}</p>
                            <p><strong>Recommendations:</strong> {{ $report->recommendation }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
