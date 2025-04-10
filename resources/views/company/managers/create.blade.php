@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('company.manager')}}">Managers </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Create Manager</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="card-title">Enter Manager Details</h4>

                        <form action="{{ route('company.manager.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-4">
                                    <label class="label">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="first_name"
                                        placeholder="Enter First Name" required>
                                         @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Sur Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="sur_name" placeholder="Enter Sur Name"
                                        required>
                                         @error('sur_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Date of Birth <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date_of_birth" required>
                                     @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Bio </label>
                                    <textarea class="form-control" name="bio"></textarea>
                                     @error('bio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address"></textarea>
                                     @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Phone Number <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="phone_number"
                                        placeholder="Enter Phone Number" required>
                                         @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Enter Email Address" required>
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
                                        <option value="Support Worker">Support Worker</option>
                                        <option value="Care Coordinator">Care Coordinator</option>
                                        <option value="Operations Manager">Operations Manager</option>
                                        <option value="Finance Director">Finance Director</option>
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
                                    <input type="file" class="form-control" name="certificate" >
                                     @error('notes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Date of Employment <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date_of_employment" required>
                                     @error('date_of_employment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Create Manager</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
