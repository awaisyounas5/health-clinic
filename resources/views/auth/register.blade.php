@extends('layouts.app')

@section('content')
<div class="main-wrapper login-body">
    <div class="container-fluid px-0">
        <div class="row">

            <div class="col-lg-6 login-wrap">
                <div class="login-sec">
                    <div class="log-img">
                        <img class="img-fluid" src="{{asset('assets/img/login-02.png')}}" alt="Logo">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 login-wrap-bg">
                <div class="login-wrapper">
                    <div class="loginbox">
                        <div class="login-right">
                            <div class="login-right-wrap">
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <div class="account-logo">
                                    <a href="index.html"><img src="assets/img/login-logo.png" alt width="200"></a>
                                </div>
                                <h2>Getting Started</h2>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="input-block">
                                        <label>Company Name <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your company name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="input-block">
                                        <label>Email <span class="login-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="input-block">
                                        <label>Password <span class="login-danger">*</span></label>
                                        <input class="form-control pass-input" type="password" name="password" required autocomplete="new-password" placeholder="Enter your password">
                                        <span class="profile-views feather-eye-off toggle-password"></span>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="input-block">
                                        <label>Confirm Password <span class="login-danger">*</span></label>
                                        <input class="form-control pass-input-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
                                        <span class="profile-views feather-eye-off confirm-password"></span>
                                    </div>
                                    <div class="forgotpass">
                                        <div class="remember-me">
                                            <label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> I agree
                                                to the <a href="javascript:;">&nbsp terms of service </a>&nbsp and
                                                <a href="javascript:;">&nbsp privacy policy </a>
                                                <input type="checkbox" name="radio">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="input-block login-btn">
                                        <button class="btn btn-primary btn-block" type="submit">Sign up</button>
                                    </div>
                                </form>

                                <div class="next-sign">
                                    <p class="account-subtitle">Already have account? <a href="{{ route('login') }}">Login</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
