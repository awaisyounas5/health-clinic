@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('company.reviews') }}">Review</a>
                        </li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">View Review</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="card-title">Review Details</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Category:</strong> {{ $review->category }}</p>
                            <p><strong>Patient Name:</strong> {{ $review->patient->name }}</p>
                            <p><strong>Description:</strong> {{ $review->description }}</p>
                            <p><strong>Attachment:</strong><img src="{{asset('assets/upload/'.$review->attachment)}}" alt="" height="100px" width="100px"> </p>
                            <p><strong>Status:</strong> {{$review->status=="N" ? 'New' : 'Acknowledged' }}</p>
                        </div>
                        @if($review->status=='N')
                        <div class="col-md-12 mt-3">
                            <a class="btn btn-primary" href="{{ route('company.reviews.change_status', $review->id) }}">Acknowledge</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
