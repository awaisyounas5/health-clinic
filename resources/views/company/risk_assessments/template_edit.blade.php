@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('company.template') }}">Risk Assessments</a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Edit Assessments</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="card-block">
                            <h6 class="card-title text-bold">Edit Risk Assessment</h6>
                            <form action="{{ route('company.risk_assessment.template_update', $template->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="form-group mb-4 col-sm-6">
                                        <label for="template_name">Template Name <span class="text-danger">*</span> <span class="text-danger">*</span></label>
                                        <input type="text" name="template_name" id="template_name" class="form-control"
                                            value="{{ $template->title }}"placeholder="Enter template name">
                                        @error('template_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4 col-sm-6">
                                        <label for="risk_level">Risk Level <span class="text-danger">*</span></label>
                                        <select name="risk_level" id="risk_level" class="form-control" required>
                                            <option value="" selected disabled>Select risk level</option>
                                            <option value="low" @selected($template->risk_level == 'low')>Low</option>
                                            <option value="medium" @selected($template->risk_level == 'medium')>Medium</option>
                                            <option value="high" @selected($template->risk_level == 'high')>High</option>
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
                                    <input type="text" name="activity_issue" id="activity_issue" class="form-control"
                                        value="{{ $template->activity_issue }}" required
                                        placeholder="Enter activity or issue being assessed">
                                    @error('activity_issue')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="hazards_identified">Hazards Identified <span class="text-danger">*</span></label>
                                    <textarea name="hazards_identified" id="hazards_identified" class="form-control" rows="3" required
                                        placeholder="Describe hazards identified">{{ $template->hazards_identified }}</textarea>
                                    @error('hazards_identified')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="affected_persons">Who might be affected by Hazards <span class="text-danger">*</span></label>
                                    <textarea name="affected_persons" id="affected_persons" class="form-control" rows="3" required
                                        placeholder="Describe who might be affected">{{ $template->affected_persons }}</textarea>
                                    @error('affected_persons')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="current_measures">Current Risk Control Measures in place <span class="text-danger">*</span></label>
                                    <textarea name="current_measures" id="current_measures" class="form-control" rows="3" required
                                        placeholder="Describe current risk control measures">{{ $template->current_measures }}</textarea>
                                    @error('current_measures')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="further_measures">Further Risk Control Measures that need to be put into
                                        place <span class="text-danger">*</span></label>
                                    <textarea name="further_measures" id="further_measures" class="form-control" rows="3" required
                                        placeholder="Describe further risk control measures">{{ $template->further_measures }}</textarea>
                                    @error('further_measures')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
