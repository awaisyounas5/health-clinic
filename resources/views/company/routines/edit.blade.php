@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('company.routines') }}">Routines</a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Edit Routine Activity</li>
                    </ul>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="card-title">Edit Routine Activity</h4>
                        <form action="{{ route('company.routines.update', $routine->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group mb-4">
                                    <label class="label">Choose Patient <span class="text-danger">*</span></label>
                                    <select class="form-control @error('patient_id') is-invalid @enderror" name="patient_id" required>
                                        @foreach($patients as $patient)
                                        <option value="{{ $patient->id }}" {{ $routine->patient_id == $patient->id ? 'selected' : '' }}>{{ $patient->name }}</option>
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
                                    <input type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Activity Details" name="description" value="{{ old('description', $routine->description) }}" required>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Activity Time <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time', $routine->time) }}" required>
                                    @error('time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update Routine Activity</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
