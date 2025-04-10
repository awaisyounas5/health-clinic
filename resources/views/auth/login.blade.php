@extends('layouts.app')

@section('content')
<div class="main-wrapper login-body">
    <div class="container-fluid px-0">
        <div class="row">

            <div class="col-lg-6 login-wrap">
                <div class="login-sec">
                    <div class="log-img">
                        <img class="img-fluid" src="{{ asset('assets/img/logo-page.png') }}" alt="Logo" width="350" style="margin-top:80%;">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 login-wrap-bg">
                <div class="login-wrapper">
                    <div class="loginbox">
                        <div class="login-right">
                            <div class="login-right-wrap">
                                @if (session('status'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <div class="account-logo">
                                    <a href="index.html"><img src="{{ asset('assets/img/login-logo.png') }}" alt width="200"></a>
                                </div>
                                <h2>Login</h2>

                                <form method="POST" action="{{ route('login') }}" id="login-form">
                                    @csrf
                                    <input type="hidden" name="longitude" id="longitude">
                                    <input type="hidden" name="latitude" id="latitude">
                                    <div class="input-block">
                                        <label>Email <span class="login-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" placeholder="Enter your email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="input-block">
                                        <label>Password <span class="login-danger">*</span></label>
                                        <input class="form-control pass-input" type="password" name="password" placeholder="Enter your password">
                                        <span class="profile-views feather-eye-off toggle-password"></span>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="input-block login-btn">
                                        <button class="btn btn-primary btn-block"  type="submit">Login</button>
                                    </div>
                                </form>
                                <a href="{{ route('password.request') }}" class="float-end mb-1">
                                    <span>Forgot Password?</span>
                                </a>
                                <div class="next-sign">
                                    <p class="account-subtitle">Need an account? <a href="{{route('register')}}">Sign Up</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        }
    }

    function showPosition(position) {
        $("#longitude").val(position.coords.longitude);
        $("#latitude").val(position.coords.latitude);

    }
    window.onload = function() {
            getLocation();
        };
</script>
@endsection
