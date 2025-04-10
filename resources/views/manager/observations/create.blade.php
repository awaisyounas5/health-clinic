@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('manager.observation') }}">Observations </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Create Observations Activity</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="card-title">Enter Observations Details</h4>
                        <form action="{{ route('manager.observation.store') }}" method="POST">
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
                                    @error('picture')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Respiratory Rate <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="respiratory_rate"
                                        placeholder="Respiratory Rate" required>
                                    @error('respiratory_rate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Body Temperature <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="body_temperature"
                                        placeholder="99 Centigrade" required>
                                    @error('body_temperature')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">SPO2 Level <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="spo2_level" placeholder="SPO2 Level"
                                        required>
                                    @error('spo2_level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Inspired O2 % <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="inspired_o2"
                                        placeholder="Inspired O2 %" required>
                                    @error('inspired_o2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Blood Pressure Level <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="blood_pressure_level"
                                        placeholder="198 H - 60 L" required>
                                    @error('blood_pressure_level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Heart Beat Rate <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="heart_beat_rate"
                                        placeholder="99 Per Minute" required>
                                    @error('heart_beat_rate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Conscious Level <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="concious_level"
                                        placeholder="Conscious Level" required>
                                    @error('concious_level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Additional Notes</label>
                                    <textarea class="form-control" name="additional_notes"></textarea>
                                    @error('additional_notes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Add to Observations List</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
