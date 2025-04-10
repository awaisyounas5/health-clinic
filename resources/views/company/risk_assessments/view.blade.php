@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('company.risk_assessment') }}">Risk Assessments</a>
                        </li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">View Assessments</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="card-title">Risk Assessment Details</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Risk Assessment Name:</strong> {{ $report->title }}</p>
                            <p><strong>Risk Level:</strong> {{ $report->risk_level }}</p>
                            <p><strong>Patient:</strong> {{ $report->patient->name }}</p>
                            <p><strong>Activity/Issue Being Assessed:</strong> {{ $report->activity_issue }}</p>
                            <p><strong>Hazards Identified:</strong> {{ $report->hazards_identified }}</p>
                            <p><strong>Who might be affected by Hazards:</strong> {{ $report->affected_persons }}</p>
                            <p><strong>Risk Assessment Review Time Frame:</strong> {{ $report->review_time_frame }}</p>
                            <p><strong>Date for next Risk Assessment review:</strong> {{ $report->next_review_date }}</p>
                            <p><strong>Set Reminder :</strong> {{ $report->reminder_days }}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
