@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('manager.shift_type') }}">Teams </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Update Shift Type</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="card-title">Edit Shift Type Details</h4>
                        <form action="{{ route('manager.shift_type.update', $shift_type->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="form-group mb-4">
                                    <label class="label">Team Name <span class="text-danger">*</span></label>
                                    <select class="form-control" name="team_id" required>
                                        <option value="" selected disabled>Please Choose Team</option>
                                        @if ($teams)
                                            @foreach ($teams as $team)
                                                <option value="{{ $team->id }}" @selected($team->id == $shift_type->team_id)>
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
                                    <label class="label">Shift Type Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Enter Shift Type Name" value="{{ $shift_type->title }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Shift Start Time <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control" name="start_time"
                                        value="{{ $shift_type->start_time }}" required>
                                    @error('start_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Shift End Time <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control" name="end_time"
                                        value="{{ $shift_type->end_time }}" required>
                                    @error('end_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update Shift Type</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection
