@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('manager.observation') }}">Observations</a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Update Observation</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="card-title">Enter Observations Details</h4>
                        <form action="{{ route('manager.observation.update', $observation->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group mb-4">
                                    <label class="label">Choose Patient <span class="text-danger">*</span></label>
                                    <select class="form-control @error('patient_id') is-invalid @enderror" name="patient_id"
                                        required>
                                        @foreach ($patients as $patient)
                                            <option value="{{ $patient->id }}"
                                                {{ $observation->patient_id == $patient->id ? 'selected' : '' }}>
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
                                    <label class="label">Respiratory Rate <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Respiratory Rate"
                                        name="respiratory_rate" value="{{ $observation->respiratory_rate }}" required>
                                    @error('respiratory_rate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Body Temperature <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="99 Centigrade"
                                        name="body_temperature" value="{{ $observation->body_temperature }}" required>
                                    @error('body_temperature')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">SPO2 Level <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="SPO2 Level" name="spo2_level"
                                        value="{{ $observation->spo2_level }}" required>
                                    @error('spo2_level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Inspired O2 % <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Inspired O2 %"
                                        name="inspired_o2" value="{{ $observation->inspired_o2 }}" required>
                                    @error('inspired_o2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Blood Pressure Level <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="198 H - 60 L"
                                        name="blood_pressure_level" value="{{ $observation->blood_pressure_level }}"
                                        required>
                                    @error('blood_pressure_level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Heart Beat Rate <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="99 Per Minute"
                                        name="heart_beat_rate" value="{{ $observation->heart_beat_rate }}" required>
                                    @error('heart_beat_rate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Conscious Level <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Conscious Level"
                                        name="concious_level" value="{{ $observation->concious_level }}" required>
                                    @error('concious_level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Additional Notes</label>
                                    <textarea class="form-control" name="additional_notes">{{ $observation->additional_notes }}</textarea>
                                    @error('additional_notes')
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
