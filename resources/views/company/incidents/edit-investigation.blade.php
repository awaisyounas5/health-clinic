@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('company.incidents.view_investigations') }}">Incident Investigations </a>
                            </li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Edit Incident Investigation</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="card-title">Edit Investigation Details</h4>
                        <form action="{{ route('company.incidents.update_investigation', $investigation->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="incident_id" value="{{ $investigation->incident_id }}">
                            <div class="row">
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Date of Investigation <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date_of_investigation"
                                        value="{{ $investigation->investigation_date }}" required>
                                    @error('date_of_investigation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Time of Investigation <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control" name="time_of_investigation"
                                        value="{{ $investigation->investigation_time }}" required>
                                    @error('time_of_investigation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-12">
                                    <label class="label">People Involved <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="people_involved"
                                        value="{{ $investigation->people_involved }}"
                                        placeholder="Enter names of people involved" required>
                                    @error('people_involved')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-5">
                                    <label class="label">Position of Investigator <span class="text-danger">*</span></label>
                                    <select class="form-control" name="position_of_investigator" required>
                                        <option value="" disabled>Please Select</option>
                                        <option value="Manager"
                                            {{ $investigation->position_of_investigator == 'Manager' ? 'selected' : '' }}>
                                            Manager</option>
                                        <option value="Supervisor"
                                            {{ $investigation->position_of_investigator == 'Supervisor' ? 'selected' : '' }}>
                                            Supervisor</option>
                                        <option value="Employee"
                                            {{ $investigation->position_of_investigator == 'Employee' ? 'selected' : '' }}>
                                            Employee</option>
                                    </select>
                                    @error('position_of_investigator')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-1" style="margin-top: 25px;">
                                    <a class="btn btn-secondary btn-lg text-white" href="">+</a>
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Name of Investigator <span class="text-danger">*</span></label>
                                    <select class="form-control" name="name_of_investigator" required>
                                        <option value="" disabled selected>DISPLAY STAFF MEMBERS IN THIS DROPDOWN
                                        </option>
                                        <option value="Investigator 1"
                                            {{ $investigation->name_of_investigator == 'Investigator 1' ? 'selected' : '' }}>
                                            Investigator 1</option>
                                        <option value="Investigator 2"
                                            {{ $investigation->name_of_investigator == 'Investigator 2' ? 'selected' : '' }}>
                                            Investigator 2</option>
                                        <option value="Investigator 3"
                                            {{ $investigation->name_of_investigator == 'Investigator 3' ? 'selected' : '' }}>
                                            Investigator 3</option>
                                    </select>
                                    @error('name_of_investigator')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-12">
                                    <label class="label">Location <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="location"
                                        value="{{ $investigation->location }}" placeholder="Enter location" required>
                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-12">
                                    <label class="label">Incident Details <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="incident_details" placeholder="Enter details of the incident" rows="4"
                                        required>{{ $investigation->incident_details }}</textarea>
                                    @error('incident_details')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-5">
                                    <label class="label">Results of Investigation <span class="text-danger">*</span></label>
                                    <select class="form-control" name="results_of_investigation" required>
                                        <option value="" disabled>Please Select</option>
                                        <option value="Result 1"
                                            {{ $investigation->results_of_investigation == 'Result 1' ? 'selected' : '' }}>
                                            Result 1</option>
                                        <option value="Result 2"
                                            {{ $investigation->results_of_investigation == 'Result 2' ? 'selected' : '' }}>
                                            Result 2</option>
                                        <option value="Result 3"
                                            {{ $investigation->results_of_investigation == 'Result 3' ? 'selected' : '' }}>
                                            Result 3</option>
                                    </select>
                                    @error('results_of_investigation')
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
                                        <option value="Recommendation 1"
                                            {{ $investigation->recommendations == 'Recommendation 1' ? 'selected' : '' }}>
                                            Recommendation 1</option>
                                        <option value="Recommendation 2"
                                            {{ $investigation->recommendations == 'Recommendation 2' ? 'selected' : '' }}>
                                            Recommendation 2</option>
                                        <option value="Recommendation 3"
                                            {{ $investigation->recommendations == 'Recommendation 3' ? 'selected' : '' }}>
                                            Recommendation 3</option>
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
                                <button type="submit" class="btn btn-primary">Update Investigation</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
