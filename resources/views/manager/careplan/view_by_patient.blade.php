@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.careplan')}}">Care Plan </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">View Care Plan By Patient</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-box profile-header">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="#"><img class="avatar" src="{{asset($patient_detail->photo? 'assets/upload/'.$patient_detail->photo: 'assets/img/profiles/avatar-05.jpg')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0 mb-0">{{$patient_detail->name}}</h3>
                                        <small class="text-muted">Patient</small>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">Phone:</span>
                                            <span class="text"><a href="">{{$patient_detail->phone_number}}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">Email:</span>
                                            <span class="text"><a href="">{{$patient_detail->email}}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">Sur Name:</span>
                                            <span class="text">{{$patient_detail->surname}}</span>
                                        </li>
                                        <li>
                                            <span class="title">Address:</span>
                                            <span class="text">{{$patient_detail->address}}</span>
                                        </li>
                                        <li>
                                            <span class="title">Legal Representative Name:</span>
                                            <span class="text">{{$patient_detail->legal_representative_name}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-tabs">
            <ul class="nav nav-tabs nav-tabs-bottom" role="tablist">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="#about-cont"
                        data-bs-toggle="tab" aria-selected="true" role="tab">Medications</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#bottom-tab2" data-bs-toggle="tab"
                        aria-selected="false" tabindex="-1" role="tab">Routines</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#bottom-tab3" data-bs-toggle="tab"
                        aria-selected="false" tabindex="-1" role="tab">Observations</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane show active" id="about-cont" role="tabpanel">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box">
                                <h3 class="card-title">Medications Informations</h3>
                                <div class="experience-box">
                                    <ul class="experience-list">
                                        @foreach ($medications as $medication)
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a href="#/" class="name">{{$medication->name}} - {{$medication->amount}} Tablets - {{$medication->dose}}</a>
                                                    <div>{{$medication->notes}}</div>
                                                    <span class="time">{{$medication->start_date}} to {{$medication->end_date}}</span>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="bottom-tab2" role="tabpanel">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box">
                                <h3 class="card-title">Routines Informations</h3>
                                <div class="experience-box">
                                    <ul class="experience-list">
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            @foreach ($routines as $routine)
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a href="#/" class="name">{{$routine->description}}</a>
                                                    <span class="time">{{$routine->time}}</span>
                                                </div>
                                            </div>
                                            @endforeach

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="bottom-tab3" role="tabpanel">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box">
                                <h3 class="card-title">Observations Informations</h3>
                                <div class="experience-box">
                                    <ul class="experience-list">
                                        @foreach ($observations as $observation)
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a href="#/" class="name">Respiratory Rate - {{$observation->respiratory_rate}} | Temeprature - {{$observation->body_temperature}} | SPO2 Level: {{$observation->spo2_level}} | Inspired O2 % - {{$observation->inspired_o2}} | Blood Pressure - {{$observation->blood_pressure_level}}| Heart Beat Rate - {{$observation->heart_beat_rate}} | Conscious Level - {{$observation->concious_level}}</a>

                                                </div>
                                            </div>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @endsection
