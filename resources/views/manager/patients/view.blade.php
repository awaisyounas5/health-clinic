@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.patient')}}">Patients </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">View Patient Profile</li>
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
                                                    <img src="{{asset($patient->photo? 'assets/upload/'.$patient->photo: 'assets/img/profiles/avatar-05.jpg')}}"
                                                        alt="Profile">
                                                    <div class="input-block doctor-up-files profile-edit-icon mb-0">
                                                        <div class="uplod d-flex">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="names-profiles">
                                                    <h4>{{$patient->name}} {{$patient->surname}}</h4>
                                                    <h5>Patient</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 d-flex align-items-center">
                                            <div class="follow-btn-group">
                                                <a href="{{route('manager.patient.edit',$patient->id)}}"
                                                    class="btn btn-info follow-btns">Edit Profile</a>
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
                                                            src="{{asset('assets/img/icons/menu-icon-02.svg')}}" alt=""></span>About
                                                    me</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="personal-list-out">
                                        <div class="row">
                                            <div class="col-xl-3 col-md-6 mb-4">
                                                <div class="detail-personal">
                                                    <h2>Full Name</h2>
                                                    <h3>{{$patient->name}}</h3>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 mb-4">
                                                <div class="detail-personal">
                                                    <h2>Preffered Name</h2>
                                                    <h3>{{$patient->prefered_name}}</h3>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 mb-4">
                                                <div class="detail-personal">
                                                    <h2>Mobile </h2>
                                                    <h3>{{$patient->phone_number}}</h3>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 mb-4">
                                                <div class="detail-personal">
                                                    <h2>Email</h2>
                                                    <h3>{{$patient->email}}</h3>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 mb-4">
                                                <div class="detail-personal">
                                                    <h2>Address</h2>
                                                    <h3>{{$patient->address}}</h3>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 mb-4">
                                                <div class="detail-personal">
                                                    <h2>Legal Representative</h2>
                                                    <h3>{{$patient->legal_representative_name}}</h3>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-6 mb-4">
                                                <div class="detail-personal">
                                                    <h2>Bio</h2>
                                                    <h3>{{$patient->bio}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="hello-park mb-2">
                                        <h5>Allergies</h5>
                                        <div class="hello-park">
                                            <p>{{$patient->allergies}}</p>
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
