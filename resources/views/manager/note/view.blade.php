@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="card-title">Shift Details</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Name: </strong>{{ $shift->shift_type->title }}</p>
                                <!-- Replace with actual shift name -->
                                <p><strong>Time:</strong>{{ \Carbon\Carbon::createFromFormat('H:i:s', $shift->shift_type->start_time)->format('g:i A') }}
                                    -
                                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $shift->shift_type->end_time)->format('g:i A') }}
                                </p> <!-- Replace with actual shift timings -->
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h4 class="mb-3">Tasks</h4>
                                <div class="list-group">

                                    @foreach ($shift_tasks as $shiftTaskDataRoutine)
                                        @if (isset($shiftTaskDataRoutine['cateory_data']['routine']))
                                            @foreach ($shiftTaskDataRoutine['cateory_data']['routine'] as $routine)
                                                <a class="list-group-item list-group-item-action">
                                                    <h6 class="mb-1">{{ $routine['description'] }}</h6>
                                                    <p class="mb-1">Status: {{ $shiftTaskDataRoutine['status'] }}</p>
                                                    @if ($shiftTaskDataRoutine['reason_for_no'])
                                                        <small class="text-muted">Reason:
                                                            {{ $shiftTaskDataRoutine['reason_for_no'] }}</small>
                                                    @endif
                                                </a>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h4 class="mb-3">Medications</h4>
                                <div class="list-group">
                                    @foreach ($shift_tasks as $shiftTaskDataRoutine)
                                        @if (isset($shiftTaskDataRoutine['cateory_data']['medication']))
                                            @foreach ($shiftTaskDataRoutine['cateory_data']['medication'] as $medication)
                                                <a class="list-group-item list-group-item-action">
                                                    <h5 class="mb-1">{{ @$medication['name'] }} -
                                                        {{ @$medication['dose'] }}</h5>
                                                    <p class="mb-1">Amount: {{ @$medication['amount'] }}</p>
                                                    <p class="mb-1">Notes: {{ @$medication['notes'] }}</p>
                                                    <p class="mb-1">Status: {{ @$shiftTaskDataRoutine['status'] }}</p>
                                                    @if ($shiftTaskDataRoutine['reason_for_no'])
                                                        <small class="text-muted">Reason:
                                                            {{ $shiftTaskDataRoutine['reason_for_no'] }}</small>
                                                    @endif
                                                </a>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h4 class="mb-3">Observations</h4>
                                <div class="list-group">
                                    <a class="list-group-item list-group-item-action">
                                        <p>Status: {{ @$shift_observations->status }}</p>
                                        <p>Respiratory Rate: {{ @$shift_observations->respiratory_rate }}</p>
                                        <p>Body Temperature: {{ @$shift_observations->body_temperature }}</p>
                                        <p>SPO2 Level: {{ @$shift_observations->spo2_level }}</p>
                                        <p>Inspired O2 %: {{ @$shift_observations->inspired_o2 }}</p>
                                        <p>Blood Pressure: {{ @$shift_observations->blood_pressure_level }}</p>
                                        <p>Heart Beat Rate: {{ @$shift_observations->heart_beat_rate }}</p>
                                        <p>Conscious Level: {{ @$shift_observations->concious_level }}</p>
                                        <p>Additional Notes: {{ @$shift_observations->additional_notes }}</p>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h4 class="mb-3">Additional Finding</h4>
                                <div class="list-group">
                                    <a class="list-group-item list-group-item-action">
                                        <p>{{ @$shift_findings->additional_findings }}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
