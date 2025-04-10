@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('manager.routines') }}">Routines</a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Create Routine Activity</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="card-title">Enter Routine Activity Details</h4>
                        <form action="{{ route('manager.routines.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-4">
                                    <label class="label">Choose Patient <span class="text-danger">*</span></label>
                                    <select class="form-control" name="patient_id" required>
                                        <option value="" selected disabled>Please Choose Patient</option>
                                        @foreach ($patients as $patient)
                                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('patient_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Activity Details <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Activity Details"
                                        name="description" required>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Activity Time <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control" name="time" required>
                                    @error('time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Add to Routine Activities</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
