@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('company.manager')}}">Mananger </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">View Manager Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="doctor-profile-head">

                                    <div class="row">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="profile-user-box">
                                                <div class="profile-user-img">
                                                    <img src="{{asset($manager->photo? 'assets/upload/'.$manager->photo: 'assets/img/profiles/avatar-05.jpg')}}" alt="Profile">
                                                    <div class="input-block doctor-up-files profile-edit-icon mb-0">
                                                        <div class="uplod d-flex">
                                                            <label class="file-upload profile-upbtn mb-0">
                                                                <img src="https://preclinic.dreamstechnologies.com/html/template/assets/img/icons/camera-icon.svg"
                                                                    alt="Profile"><input type="file">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="names-profiles">
                                                    <h4>{{$manager->name}} {{$manager->surname}}</h4>
                                                    <h5>{{$manager->position}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 d-flex align-items-center">
                                            <div class="follow-btn-group">
                                                <a href="{{route('company.manager.edit',$manager->id)}}" class="btn btn-info follow-btns">Edit Profile</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="doctor-personals-grp">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content-set">
                                        <ul class="nav">
                                            <li>
                                                <a href="staff-profile.html" class="active"><span
                                                        class="set-about-icon me-2"><img
                                                            src="assets/img/icons/menu-icon-02.svg" alt=""></span>About
                                                    me</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="personal-list-out">
                                        <div class="row">
                                            <div class="col-xl-3 col-md-6 mb-4">
                                                <div class="detail-personal">
                                                    <h2>Full Name</h2>
                                                    <h3>{{$manager->name}} {{$manager->surname}}</h3>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 mb-4">
                                                <div class="detail-personal">
                                                    <h2>Mobile </h2>
                                                    <h3>{{$manager->phone_number}}</h3>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 mb-4">
                                                <div class="detail-personal">
                                                    <h2>Email</h2>
                                                    <h3>{{$manager->email}}</h3>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 mb-4">
                                                <div class="detail-personal">
                                                    <h2>Address</h2>
                                                    <h3>{{$manager->address}}</h3>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 mb-4">
                                                <div class="detail-personal">
                                                    <h2>Position</h2>
                                                    <h3>{{$manager->position}}</h3>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 mb-4">
                                                <div class="detail-personal">
                                                    <h2>Date of Employment</h2>
                                                    <h3>{{$manager->date_of_employment}}</h3>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-6 mb-4">
                                                <div class="detail-personal">
                                                    <h2>Bio</h2>
                                                    <h3>{{$manager->bio}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="hello-park mb-2">
                                        <h5>Certificate & CV</h5>
                                        <div class="table-responsive">
                                            <table class="table mb-0 border-0 custom-table profile-table">
                                                <thead>
                                                    <tr>
                                                        <th>File Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{$manager->certificate}}</td>
                                                        <td>
                                                            <a href="{{asset('assets/upload/'.$manager->certificate)}}"
                                                                class="custom-badge status-green ">View</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$manager->cv}}</td>
                                                        <td>
                                                            <a href="{{asset('assets/upload/'.$manager->cv)}}"
                                                                class="custom-badge status-green ">View</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
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
