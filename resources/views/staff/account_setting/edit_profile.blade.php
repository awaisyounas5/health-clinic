@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('staff_member.view.profile')}}">Profile </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Update Profiles Details</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="card-title">Profile Details</h4>
                    <form action="{{route('staff_member.update.profile')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="form-group col-xl-6 mb-4">
                                <label class="label">First Name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="Enter First Name"
                                    value="{{Auth::user()->name}}" required>
                            </div>
                            <div class="form-group col-xl-6  mb-4">
                                <label class="label">Sur Name</label>
                                <input type="text" class="form-control" name="sur_name" value="{{Auth::user()->surname}}" placeholder="Enter Sur Name"
                                    required>
                            </div>
                            <div class="form-group col-xl-4 mb-4">
                                <label class="label">Preffered Name</label>
                                <input type="text" class="form-control" name="preffered_name"
                                    placeholder="Enter Preffered Name" value="{{Auth::user()->prefered_name}}" required>
                            </div>
                            <div class="form-group col-xl-4 mb-4">
                                <label class="label">Date of Birth</label>
                                <input type="date" class="form-control" name="date_of_birth" value="{{Auth::user()->date_of_birth}}" required>
                            </div>
                            <div class="form-group col-xl-4 mb-4">
                                <label class="label">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number"
                                    placeholder="Enter Phone Number" value="{{Auth::user()->phone_number}}" required>
                            </div>
                            <div class="form-group col-xl-6 mb-4">
                                <label class="label">Email Address</label>
                                <input type="email" class="form-control" name="email"
                                    placeholder="Enter Email Address" value="{{Auth::user()->email}}" required>
                            </div>

                            <div class="form-group col-xl-6 mb-4">
                                <label class="label">Upload Picture</label>
                                <input type="file" class="form-control" name="photo">
                            </div>
                            <div class="form-group mb-4">
                                <label class="label">Bio</label>
                                <textarea class="form-control" name="bio" >{{Auth::user()->bio}}</textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label class="label">Address</label>
                                <textarea class="form-control" name="address" >{{Auth::user()->address}}</textarea>
                            </div>

                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
