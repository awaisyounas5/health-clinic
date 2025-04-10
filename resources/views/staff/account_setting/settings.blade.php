@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('staff_member.setting.change_password')}}">Settings </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Change Password</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="card-title">Change Password</h4>
                        <form action="{{ route('staff_member.setting.update_password') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-4">
                                    <label class="label">Current Password</label>
                                    <input type="password" class="form-control" name="current_password"
                                        placeholder="Enter Current Password" required>
                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">New Password</label>
                                    <input type="password" class="form-control" name="new_password"
                                        placeholder="Enter New Password" required>
                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Confirm New Password</label>
                                    <input type="password" class="form-control" name="new_password_confirmation"
                                        placeholder="Confirm New Password" required>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
