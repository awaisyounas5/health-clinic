@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('company.staff')}}">Staff </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Update Staff Details</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="card-title">Enter Staff Details</h4>
                        <form action="{{ route('company.staff.update', $staff->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-4">
                                    <label class="label">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="first_name"
                                        placeholder="Enter First Name" value="{{ $staff->name }}" required>
                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Sur Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="sur_name" value="{{ $staff->surname }}"
                                        placeholder="Enter Sur Name" required>
                                        @error('sur_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Contracted Hours Per Week <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="contracted_hours"
                                        placeholder="Enter Contracted Hours Per Week" value="{{ $staff->contracted_hours }}"
                                        required>
                                        @error('contracted_hours')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Date of Birth <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date_of_birth"
                                        value="{{ \Carbon\Carbon::parse($staff->date_of_birth)->format('Y-m-d') }}" required>
                                        @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Bio </label>
                                    <textarea class="form-control" name="bio">{{ $staff->bio }}</textarea>
                                    @error('bio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address">{{ $staff->address }}</textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Phone Number <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="phone_number"
                                        placeholder="Enter Phone Number" value="{{ $staff->phone_number }}" required>
                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Enter Email Address" value="{{ $staff->email }}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Preffered Shift Patterns <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="shift_patterns">{{ $staff->shift_patterns }}</textarea>
                                    @error('shift_patterns')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Team Name <span class="text-danger">*</span></label>
                                    <select class="form-control" name="team_id" required>
                                        <option value="" selected disabled>Please Choose Team</option>
                                        @if ($teams)
                                            @foreach ($teams as $team)
                                                <option value="{{ $team->id }}" @selected($team->id == $staff->team_id)>
                                                    {{ $team->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('team_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="label">Position <span class="text-danger">*</span></label>
                                    <select class="form-control" name="position" required>
                                        <option value="" selected disabled>Please Choose Position</option>
                                        <option value="Support Worker" @selected($staff->position == 'Support Worker')>Support Worker</option>
                                        <option value="Care Coordinator" @selected($staff->position == 'Care Coordinator')>Care Coordinator
                                        </option>
                                        <option value="Operations Manager" @selected($staff->position == 'Operations Manager')>Operations Manager
                                        </option>
                                        <option value="Finance Director" @selected($staff->position == 'Finance Director')>Finance Director
                                        </option>

                                    </select>
                                    @error('position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Upload Picture</label>
                                    <input type="file" class="form-control" name="photo" >
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Upload CV</label>
                                    <input type="file" class="form-control" name="cv" >
                                    @error('cv')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Upload Certificate </label>
                                    <input type="file" class="form-control" name="certificate" >
                                    @error('certificate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Induction Done? <span class="text-danger">*</span></label>
                                    <select class="form-control" name="induction" required>
                                        <option value="" selected disabled>Please Choose</option>
                                        <option value="Y" @selected($staff->induction == 'Y')>Yes</option>
                                        <option value="N" @selected($staff->induction == 'N')>No</option>
                                    </select>
                                    @error('induction')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Mandatory Training Done? <span class="text-danger">*</span></label>
                                    <select class="form-control" name="training" required>
                                        <option value="" selected disabled>Please Choose</option>
                                        <option value="Y" @selected($staff->training == 'Y')>Yes</option>
                                        <option value="N" @selected($staff->training == 'N')>No</option>
                                    </select>
                                    @error('training')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Still on Probation? <span class="text-danger">*</span></label>
                                    <select class="form-control" name="probation" required>
                                        <option value="" selected disabled>Please Choose</option>
                                        <option value="Y" @selected($staff->probation == 'Y')>Yes</option>
                                        <option value="N" @selected($staff->probation == 'N')>No</option>
                                    </select>
                                    @error('probation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Date of Employment <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date_of_employment" value="{{ \Carbon\Carbon::parse($staff->date_of_employment)->format('Y-m-d') }}" required>
                                    @error('date_of_employment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update Staff Member</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection
