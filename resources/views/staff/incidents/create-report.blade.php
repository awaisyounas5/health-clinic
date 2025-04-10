@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('staff_member.incidents.view_reports') }}">Incident Reports </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Create Incident Report</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="card-title">Enter Report Details</h4>
                    <form action="{{route('staff_member.incidents.store_report')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group mb-4 col-md-6">
                                <label class="label">Date</label>
                                <input type="date" class="form-control" name="date" required>
                            </div>
                            <div class="form-group mb-4 col-md-6">
                                <label class="label">Time</label>
                                <input type="time" class="form-control" name="time" required>
                            </div>
                            <div class="form-group mb-4 col-md-12">
                                <label class="label">People Involved</label>
                                <input type="text" class="form-control" name="people_involved" placeholder="Enter names of people involved" required>
                            </div>
                            <div class="form-group mb-4 col-md-5">
                                <label class="label">Position of Reporter</label>
                                <select class="form-control" name="position_of_reporter" required>
                                    <option value="" disabled selected>Please Select</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Supervisor">Supervisor</option>
                                    <option value="Employee">Employee</option>
                                </select>
                            </div>
                            <div class="col-md-1" style="margin-top: 25px;">
                                <a class="btn btn-secondary btn-lg text-white" href="">+</a>
                            </div>
                            <div class="form-group mb-4 col-md-6">
                                <label class="label">Location</label>
                                <input type="text" class="form-control" name="location" placeholder="Enter location" required>
                            </div>
                            <div class="form-group mb-4 col-md-12">
                                <label class="label">Name of Reporter</label>
                                <input type="text" class="form-control" name="name_of_reporter" placeholder="Enter name of reporter" required>
                            </div>
                            <div class="form-group mb-4 col-md-12">
                                <label class="label">Incident Details</label>
                                <textarea class="form-control" name="incident_details" placeholder="Enter details of the incident" rows="4" required></textarea>
                            </div>
                            <div class="form-group mb-4 col-md-6">
                                <label class="label">Severity of Incidents</label>
                                <select class="form-control" name="severity_of_incidents" required>
                                    <option value="" disabled selected>Please Select</option>
                                    <option value="Low">Low</option>
                                    <option value="Medium">Medium</option>
                                    <option value="High">High</option>
                                </select>
                            </div>
                            <div class="form-group mb-4 col-md-5">
                                <label class="label">Type of Incidents</label>
                                <select class="form-control" name="type_of_incidents" required>
                                    <option value="" disabled selected>Please Select</option>
                                    <option value="Accident">Accident</option>
                                    <option value="Theft">Theft</option>
                                    <option value="Damage">Damage</option>
                                </select>
                            </div>
                            <div class="col-md-1" style="margin-top: 25px;">
                                <a class="btn btn-secondary btn-lg text-white" href="">+</a>
                            </div>
                            <div class="form-group mb-4 col-md-5">
                                <label class="label">Possible Trigger</label>
                                <select class="form-control" name="possible_trigger" required>
                                    <option value="" disabled selected>Please Select</option>
                                    <option value="Negligence">Negligence</option>
                                    <option value="Equipment Failure">Equipment Failure</option>
                                    <option value="Human Error">Human Error</option>
                                </select>
                            </div>
                            <div class="col-md-1" style="margin-top: 25px;">
                                <a class="btn btn-secondary btn-lg text-white" href="">+</a>
                            </div>
                            <div class="form-group mb-4 col-md-5">
                                <label class="label">Recommendations</label>
                                <select class="form-control" name="recommendations" required>
                                    <option value="" disabled selected>Please Select</option>
                                    <option value="Training">Training</option>
                                    <option value="Policy Change">Policy Change</option>
                                    <option value="New Equipment">New Equipment</option>
                                </select>
                            </div>
                            <div class="col-md-1" style="margin-top: 25px;">
                                <a class="btn btn-secondary btn-lg text-white" href="">+</a>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit Report</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
