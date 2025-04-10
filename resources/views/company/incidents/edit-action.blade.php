@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('company.incidents.view_actions') }}">Incident
                                    Actions </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Edit Incident Action</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="card-title">Edit Action Details</h4>
                        <form action="{{ route('company.incidents.update_action', $action->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="investigation_id" value="{{ $action->investigation_id }}">
                            <div class="row">
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Date of Action <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date_of_action"
                                        value="{{ $action->action_date }}" required>
                                    @error('date_of_action')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Time of Action <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control" name="time_of_action"
                                        value="{{ $action->action_time }}" required>
                                    @error('time_of_action')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Time Frame of Completion <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="time_frame_of_completion"
                                        value="{{ $action->time_of_completion }}" required>
                                    @error('time_frame_of_completion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">People Involved <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="people_involved"
                                        value="{{ $action->people_involved }}" placeholder="Enter names of people involved"
                                        required>
                                    @error('people_involved')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Location <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="location"
                                        value="{{ $action->location }}" placeholder="Enter location" required>
                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Name of Action Lead <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name_of_action_lead"
                                        value="{{ $action->name_of_action_lead }}" placeholder="Enter name of action lead"
                                        required>
                                    @error('name_of_action_lead')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-5">
                                    <label class="label">Position of Action Lead <span class="text-danger">*</span></label>
                                    <select class="form-control" name="position_of_action_lead" required>
                                        <option value="" disabled>Please Select</option>
                                        <option value="Manager"
                                            {{ $action->position_of_action_lead == 'Manager' ? 'selected' : '' }}>Manager
                                        </option>
                                        <option value="Supervisor"
                                            {{ $action->position_of_action_lead == 'Supervisor' ? 'selected' : '' }}>
                                            Supervisor</option>
                                        <option value="Employee"
                                            {{ $action->position_of_action_lead == 'Employee' ? 'selected' : '' }}>Employee
                                        </option>
                                    </select>
                                    @error('position_of_action_lead')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-1" style="margin-top: 25px;">
                                    <a class="btn btn-secondary btn-lg text-white" href="">+</a>
                                </div>
                                <div class="form-group mb-4 col-md-5">
                                    <label class="label">Action Plans <span class="text-danger">*</span></label>
                                    <select class="form-control" name="action_plans" required>
                                        <option value="" disabled>Please Select</option>
                                        <option value="Action Plan 1"
                                            {{ $action->action_plan == 'Action Plan 1' ? 'selected' : '' }}>Action Plan 1
                                        </option>
                                        <option value="Action Plan 2"
                                            {{ $action->action_plan == 'Action Plan 2' ? 'selected' : '' }}>Action Plan 2
                                        </option>
                                        <option value="Action Plan 3"
                                            {{ $action->action_plan == 'Action Plan 3' ? 'selected' : '' }}>Action Plan 3
                                        </option>
                                    </select>
                                    @error('action_plans')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-1" style="margin-top: 25px;">
                                    <a class="btn btn-secondary btn-lg text-white" href="">+</a>
                                </div>
                                <div class="form-group mb-4 col-md-12">
                                    <label class="label">Action Plan Achievement <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="action_plan_achievement"
                                        placeholder="Describe the achievement of the action plan" rows="4" required>{{ $action->result_of_action }}</textarea>
                                    @error('action_plan_achievement')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-5">
                                    <label class="label">Action Plan Status <span class="text-danger">*</span></label>
                                    <select class="form-control" name="action_plan_status" required>
                                        <option value="" disabled>Please Select</option>
                                        <option value="In Progress"
                                            {{ $action->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="Completed" {{ $action->status == 'Completed' ? 'selected' : '' }}>
                                            Completed</option>
                                    </select>
                                    @error('action_plan_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update Action</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
