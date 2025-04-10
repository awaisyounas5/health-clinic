@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('company.manager') }}">Manager </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Update Manager Profile

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="card-title">Enter Manager Details</h4>
                        <form action="{{ route('company.manager.update', $manager->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="form-group mb-4">
                                    <label class="label">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="first_name"
                                        value="{{ $manager->name }}" placeholder="Enter First Name" required>
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Sur Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="sur_name"
                                        value="{{ $manager->surname }}" placeholder="Enter Sur Name" required>
                                    @error('sur_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Date of Birth <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date_of_birth"
                                        value="{{ \Carbon\Carbon::parse($manager->date_of_birth)->format('Y-m-d') }}" required>
                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Bio</label>
                                    <textarea class="form-control" name="bio">{{ $manager->bio }}</textarea>
                                    @error('bio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address">{{ $manager->address }}</textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Phone Number <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="phone_number"
                                        placeholder="Enter Phone Number" value="{{ $manager->phone_number }}" required>
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Enter Email Address" value="{{ $manager->email }}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="label">Position <span class="text-danger">*</span></label>
                                    <select class="form-control" name="position" required>
                                        <option value="" selected disabled>Please Choose Position</option>
                                        <option value="Operations Manager" @selected($manager->position == 'Operations Manager')>Operations Manager
                                        </option>
                                        <option value="Finance Director" @selected($manager->position == 'Finance Director')>Finance Director
                                        </option>
                                        <option value="Administrator" @selected($manager->position == 'Administrator')>Administrator</option>
                                        <option value="Care Coordinator" @selected($manager->position == 'Care Coordinator')>Care Coordinator</option>
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
                                    <label class="label">Upload Certificate</label>
                                    <input type="file" class="form-control" name="certificate">
                                    @error('certificate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Date of Employment <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date_of_employment"
                                        value="{{ $manager->date_of_employment }}" required>
                                    @error('date_of_employment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update Manager</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
