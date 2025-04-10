@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('company.medications') }}">Medications</a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Update Medication Activity</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="card-title">Enter Medications Details</h4>
                        <form action="{{ route('company.medications.update', $medications->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group mb-4">
                                    <label class="label">Choose Patient <span class="text-danger">*</span></label>
                                    <select class="form-control" name="patient_id">
                                        <option value="" disabled>Please Choose Patient</option>
                                        @foreach ($patients as $patient)
                                            <option value="{{ $patient->id }}"
                                                {{ $medications->patient_id == $patient->id ? 'selected' : '' }}>
                                                {{ $patient->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('patient_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Medicine Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Medicine Name" name="name"
                                        value="{{ $medications->name }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Medicine Dose <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="15mg" name="dose"
                                        value="{{ $medications->dose }}" required>
                                    @error('dose')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Medicine Amount <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="2 Tablets" name="amount"
                                        value="{{ $medications->amount }}" required>
                                    @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Medication Start Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="start_date"
                                        value="{{ $medications->start_date }}" required>
                                    @error('start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Medication End Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="end_date"
                                        value="{{ $medications->end_date }}" required>
                                    @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Drug Notes <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="notes">{{ $medications->notes }}</textarea>
                                    @error('notes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
