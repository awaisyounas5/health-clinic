@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('company.risk_assessment')}}">Audits</a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Update Audit</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-block">
                        <h6 class="card-title text-bold">Update Audit</h6>
                        <form action="{{route('company.audit.update',$audit->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-4 col-sm-6">
                                    <label for="name">Audit Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{$audit->name}}" required
                                        placeholder="Enter Audit Name">
                                </div>
                                <div class="form-group mb-4 col-sm-6">
                                    <label for="name">Audit Location <span class="text-danger">*</span></label>
                                    <input type="text" name="location" id="location" class="form-control" value="{{$audit->location}}" required
                                        placeholder="Enter Audit Location">
                                </div>
                            </div>
                            @if($audit->audit_standard)
                            @foreach ($audit->audit_standard as $index=>$audit_standard)
                            <input type="hidden" name="standard_id[]" value="{{$audit_standard->id}}">
                            <div class="row">
                                <div class="form-group mb-4 col-sm-4">
                                    <label for="name">Audit Standard</label>
                                    <input type="text" name="standard[]" class="form-control" value="{{$audit_standard->standard}}"
                                        placeholder="Enter Standard For Audit">
                                </div>
                                <div class="form-group mb-4 col-sm-2">
                                    <label for="name">Issues Found</label>
                                    <input type="number" name="issues[]" class="form-control" value="{{$audit_standard->issues}}"
                                        placeholder="Enter Number of Issues Found">
                                </div>
                                <div class="form-group mb-4 col-sm-2">
                                    <label for="name">Issues Resolved</label>
                                    <input type="number" name="resolved[]" class="form-control" value="{{$audit_standard->resolved}}"
                                        placeholder="Enter Number of Issues Resolved">
                                </div>
                                <div class="form-group mb-4 col-sm-4" style="margin-top:35px;">
                                    <div class="checkbox">
                                        <label>
                                            <input type="hidden" name="checkbox[{{$index}}]" value="0">
                                            <input type="checkbox" name="checkbox[{{$index}}]" {{ $audit_standard->status != 'in_progress' ? 'checked' : '' }}> Is Standard Complete?
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group mb-4 col-sm-12">
                                    <label for="name">Additional Findings</label>
                                    <textarea class="form-control" name="additional_info[]" >{{$audit_standard->additional_info}}</textarea>
                                </div>
                            </div>
                            @endforeach
                            @endif

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
