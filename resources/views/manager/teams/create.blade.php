@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('manager.team') }}">Teams </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Create Team</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="card-title">Enter Team Details</h4>
                        <form action="{{ route('manager.team.store') }}" method="POST">
                            @csrf
                            <div class="row mb-4">
                                <div class="form-group">
                                    <label class="label">Team Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Team Name" name="name"
                                        required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Create Team</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
