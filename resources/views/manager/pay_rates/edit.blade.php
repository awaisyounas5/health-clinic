@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('manager.pay_rate') }}">Staff </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Update Pay Rate</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="card-title">Enter Pay Rate Details</h4>
                        <form action="{{ route('manager.pay_rate.update', $pay_rate->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-4">
                                    <label class="label">Choose Team <span class="text-danger">*</span></label>
                                    <select class="form-control" name="team_id" required>
                                        <option value="" selected disabled>Please Choose Team</option>
                                        @if ($teams)
                                            @foreach ($teams as $team)
                                                <option value="{{ $team->id }}" @selected($team->id == $pay_rate->team_id)>
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
                                    <label class="label">Staff Name <span class="text-danger">*</span></label>
                                    <select class="form-control" name="staff_id" required>
                                        <option value="" selected disabled>Please Choose Staff</option>
                                        @if ($staffs)
                                            @foreach ($staffs as $staff)
                                                <option value="{{ $staff->id }}" @selected($staff->id == $pay_rate->staff_id)>
                                                    {{ $staff->name }} {{ $staff->surname }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('staff_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Pay Rate Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{ $pay_rate->title }}"
                                        placeholder="Enter Pay Rate Name" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Pay Rate Amount <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="amount"
                                        value="{{ $pay_rate->amount }}" required>
                                    @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update Pay Rate</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection
