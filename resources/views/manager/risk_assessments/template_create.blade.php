@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.template')}}">Risk Assessments Template</a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Create Assessments Template</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-block">
                        <h6 class="card-title text-bold">Create Template</h6>
                        <form action="{{route('manager.risk_assessment.template_store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-4 col-sm-6">
                                    <label for="title">Template title <span class="text-danger">*</span> </label>
                                    <input type="text" name="title" id="title" class="form-control" required placeholder="Enter Template Title">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-sm-6">
                                    <label for="risk_level">Risk Level <span class="text-danger">*</span></label>
                                    <select name="risk_level" id="risk_level" class="form-control" required>
                                        <option value="" selected disabled>Select risk level</option>
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="high">High</option>
                                    </select>
                                    @error('risk_level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="activity_issue">Activity/Issue Being Assessed <span class="text-danger">*</span></label>
                                <input type="text" name="activity_issue" id="activity_issue" class="form-control" required placeholder="Enter activity or issue being assessed">
                                @error('activity_issue')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="hazards_identified">Hazards Identified <span class="text-danger">*</span></label>
                                <textarea name="hazards_identified" id="hazards_identified" class="form-control" rows="3" required placeholder="Describe hazards identified"></textarea>
                                @error('hazards_identified')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="affected_persons">Who might be affected by Hazards <span class="text-danger">*</span></label>
                                <textarea name="affected_persons" id="affected_persons" class="form-control" rows="3" required placeholder="Describe who might be affected"></textarea>
                                @error('affected_persons')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="current_measures">Current Risk Control Measures in place <span class="text-danger">*</span></label>
                                <textarea name="current_measures" id="current_measures" class="form-control" rows="3" required placeholder="Describe current risk control measures"></textarea>
                                @error('current_measures')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="further_measures">Further Risk Control Measures that need to be put into place <span class="text-danger">*</span></label>
                                <textarea name="further_measures" id="further_measures" class="form-control" rows="3" required placeholder="Describe further risk control measures"></textarea>
                                @error('further_measures')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>


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
