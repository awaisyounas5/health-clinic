@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('company.incidents.view_actions') }}">Action Reports </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">View Action Report</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="card-title">Action Report Details</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Date:</strong> {{ $report->action_date }}</p>
                            <p><strong>Time:</strong> {{ $report->action_time }}</p>
                            <p><strong>Time Of Completion:</strong> {{ $report->time_of_completion }}</p>
                            <p><strong>People Involved:</strong> {{ $report->people_involved }}</p>
                            <p><strong>Position of Action Lead:</strong> {{ $report->position_of_action_lead }}</p>
                            <p><strong>Location:</strong> {{ $report->location }}</p>
                            <p><strong>Name of Action Lead:</strong> {{ $report->name_of_action_lead }}</p>
                            <p><strong>Result Of Action:</strong> {{ $report->result_of_action }}</p>
                            <p><strong>Action Plan:</strong> {{ $report->action_plan }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
