@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('company.incidents.view_reports') }}">Incident
                                    Reports </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Edit Incident Report</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="card-title">Edit Report Details</h4>
                        <form action="{{ route('company.incidents.update_report', $report->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date"
                                        value="{{ $report->incident_date }}" required>
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Time <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control" name="time"
                                        value="{{ $report->incident_time }}" required>
                                    @error('time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-12">
                                    <label class="label">People Involved <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="people_involved"
                                        value="{{ $report->incident_people }}" placeholder="Enter names of people involved"
                                        required>
                                    @error('people_involved')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-5">
                                    <label class="label">Position of Reporter <span class="text-danger">*</span></label>
                                    <select class="form-control" name="position_of_reporter" required>
                                        <option value="" disabled>Please Select</option>
                                        <option value="Manager"
                                            {{ $report->position_of_reporter == 'Manager' ? 'selected' : '' }}>Manager
                                        </option>
                                        <option value="Supervisor"
                                            {{ $report->position_of_reporter == 'Supervisor' ? 'selected' : '' }}>Supervisor
                                        </option>
                                        <option value="Employee"
                                            {{ $report->position_of_reporter == 'Employee' ? 'selected' : '' }}>Employee
                                        </option>
                                    </select>
                                    @error('position_of_reporter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-1" style="margin-top: 25px;">
                                    <a class="btn btn-secondary btn-lg text-white" href="">+</a>
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Location <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="location"
                                        value="{{ $report->location }}" placeholder="Enter location" required>
                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-12">
                                    <label class="label">Name of Reporter <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name_of_reporter"
                                        value="{{ $report->name_of_reporter }}" placeholder="Enter name of reporter"
                                        required>
                                    @error('name_of_reporter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-12">
                                    <label class="label">Incident Details <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="incident_details" placeholder="Enter details of the incident" rows="4"
                                        required>{{ $report->incident_details }}</textarea>
                                    @error('incident_details')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Severity of Incidents <span class="text-danger">*</span></label>
                                    <select class="form-control" name="severity_of_incidents" required>
                                        <option value="" disabled>Please Select</option>
                                        <option value="Low"
                                            {{ $report->severity_of_incidents == 'Low' ? 'selected' : '' }}>Low</option>
                                        <option value="Medium"
                                            {{ $report->severity_of_incidents == 'Medium' ? 'selected' : '' }}>Medium
                                        </option>
                                        <option value="High"
                                            {{ $report->severity_of_incidents == 'High' ? 'selected' : '' }}>High</option>
                                    </select>
                                    @error('severity_of_incidents')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-5">
                                    <label class="label">Type of Incidents <span class="text-danger">*</span></label>
                                    <select class="form-control" name="type_of_incidents" required>
                                        <option value="" disabled>Please Select</option>
                                        <option value="Accident"
                                            {{ $report->type_of_incidents == 'Accident' ? 'selected' : '' }}>Accident
                                        </option>
                                        <option value="Theft"
                                            {{ $report->type_of_incidents == 'Theft' ? 'selected' : '' }}>Theft</option>
                                        <option value="Damage"
                                            {{ $report->type_of_incidents == 'Damage' ? 'selected' : '' }}>Damage</option>
                                    </select>
                                    @error('type_of_incidents')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-1" style="margin-top: 25px;">
                                    <a class="btn btn-secondary btn-lg text-white" href="">+</a>
                                </div>
                                <div class="form-group mb-4 col-md-5">
                                    <label class="label">Possible Trigger <span class="text-danger">*</span></label>
                                    <select class="form-control" name="possible_trigger" required>
                                        <option value="" disabled>Please Select</option>
                                        <option value="Negligence"
                                            {{ $report->possible_trigger == 'Negligence' ? 'selected' : '' }}>Negligence
                                        </option>
                                        <option value="Equipment Failure"
                                            {{ $report->possible_trigger == 'Equipment Failure' ? 'selected' : '' }}>
                                            Equipment Failure</option>
                                        <option value="Human Error"
                                            {{ $report->possible_trigger == 'Human Error' ? 'selected' : '' }}>Human Error
                                        </option>
                                    </select>
                                    @error('possible_trigger')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-1" style="margin-top: 25px;">
                                    <a class="btn btn-secondary btn-lg text-white" href="">+</a>
                                </div>
                                <div class="form-group mb-4 col-md-5">
                                    <label class="label">Recommendations <span class="text-danger">*</span></label>
                                    <select class="form-control" name="recommendations" required>
                                        <option value="" disabled>Please Select</option>
                                        <option value="Training"
                                            {{ $report->recommendations == 'Training' ? 'selected' : '' }}>Training
                                        </option>
                                        <option value="Policy Change"
                                            {{ $report->recommendations == 'Policy Change' ? 'selected' : '' }}>Policy
                                            Change</option>
                                        <option value="New Equipment"
                                            {{ $report->recommendations == 'New Equipment' ? 'selected' : '' }}>New
                                            Equipment</option>
                                    </select>
                                    @error('recommendations')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-1" style="margin-top: 25px;">
                                    <a class="btn btn-secondary btn-lg text-white" href="">+</a>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update Report</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
