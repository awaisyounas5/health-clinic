@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('manager.risk_assessment') }}">Risk Assessments</a>
                            </li>
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
                            <form action="{{ route('manager.risk_assessment.update', $risk_assessment->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-4">
                                    <label for="template">Templates</label>
                                    <select name="template" id="template" class="form-control">
                                        <option value="" selected disabled>Select template</option>
                                        <option value="template 1" @selected($risk_assessment->template_name == 'template 1')>template 1</option>
                                        <option value="template 2" @selected($risk_assessment->template_name == 'template 2')>template 2</option>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="form-group mb-4 col-sm-6">
                                        <label for="name">Risk Assessment Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ $risk_assessment->title }}" required
                                            placeholder="Enter risk assessment name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4 col-sm-6">
                                        <label for="risk_level">Risk Level <span class="text-danger">*</span></label>
                                        <select name="risk_level" id="risk_level" class="form-control" required>
                                            <option value="" selected disabled>Select risk level</option>
                                            <option value="low" @selected($risk_assessment->risk_level == 'low')>Low</option>
                                            <option value="medium" @selected($risk_assessment->risk_level == 'medium')>Medium</option>
                                            <option value="high" @selected($risk_assessment->risk_level == 'high')>High</option>
                                        </select>
                                        @error('risk_level')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="patient_id">Patient <span class="text-danger">*</span></label>
                                    <select name="patient_id" id="patient_id" class="form-control" required>
                                        <option value="" disabled selected>Select patient name</option>
                                        @foreach ($patients as $patient)
                                            <option value="{{ $patient->id }}" @selected($risk_assessment->patient_id == $patient->id)>
                                                {{ $patient->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('patient_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="activity_issue">Activity/Issue Being Assessed <span class="text-danger">*</span></label>
                                    <input type="text" name="activity_issue" id="activity_issue" class="form-control"
                                        value="{{ $risk_assessment->activity_issue }}" required
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
                                        placeholder="Describe hazards identified">{{ $risk_assessment->hazards_identified }}</textarea>
                                    @error('hazards_identified')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="affected_persons">Who might be affected by Hazards <span class="text-danger">*</span></label>
                                    <textarea name="affected_persons" id="affected_persons" class="form-control" rows="3" required
                                        placeholder="Describe who might be affected">{{ $risk_assessment->affected_persons }}</textarea>
                                    @error('affected_persons')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="current_measures">Current Risk Control Measures in place <span class="text-danger">*</span></label>
                                    <textarea name="current_measures" id="current_measures" class="form-control" rows="3" required
                                        placeholder="Describe current risk control measures">{{ $risk_assessment->current_measures }}</textarea>
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
                                        placeholder="Describe further risk control measures">{{ $risk_assessment->further_measures }}</textarea>
                                    @error('further_measures')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="responsible_staff_id">Staff Member Responsible for new measures to be put
                                        into place <span class="text-danger">*</span></label>
                                    <select name="responsible_staff_id" id="responsible_staff_id" class="form-control"
                                        required>
                                        <option value="" disabled selected>Select staff name</option>
                                        @foreach ($staff_members as $staff_member)
                                            <option value="{{ $staff_member->id }}" @selected($risk_assessment->responsible_staff_id == $staff_member->id)>
                                                {{ $staff_member->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('responsible_staff_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="days_needed">Number of days action is needed to be done by to apply new
                                        risk control measures <span class="text-danger">*</span></label>
                                    <input type="number" name="days_needed" id="days_needed" class="form-control"
                                        value="{{ $risk_assessment->days_needed }}" required
                                        placeholder="Enter number of days needed">
                                    @error('days_needed')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="form-group mb-4 col-sm-6">
                                        <label for="review_time_frame">Risk Assessment Review Time Frame <span class="text-danger">*</span></label>
                                        <select name="review_time_frame" id="review_time_frame" class="form-control"
                                            required>
                                            <option value="" selected disabled>Select time frame</option>
                                            <option value="6 months" @selected($risk_assessment->review_time_frame == '6 months')>6 months</option>
                                            <option value="yearly" @selected($risk_assessment->review_time_frame == 'yearly')>Yearly</option>
                                        </select>
                                        @error('review_time_frame')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4 col-sm-6">
                                        <label for="next_review_date">Date for next Risk Assessment review <span class="text-danger">*</span></label>
                                        <input type="date" name="next_review_date" id="next_review_date"
                                            class="form-control" value="{{ $risk_assessment->next_review_date }}"
                                            readonly>
                                        @error('next_review_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="reminder_days">Set Reminder (Days Before Review) <span class="text-danger">*</span></label>
                                    <input type="number" name="reminder_days" id="reminder_days" class="form-control"
                                        value="{{ $risk_assessment->reminder_days }}"required
                                        placeholder="Enter number of days for reminder">
                                    @error('reminder_days')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="add_to_template"
                                            id="add_to_template">
                                        <label class="form-check-label" for="add_to_template">
                                            Add Risk Assessment to template list
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group mb-4 d-none" id="template_name_group">
                                    <label for="template_name">Template Name</label>
                                    <input type="text" name="template_name" id="template_name" class="form-control"
                                        placeholder="Enter template name">
                                    @error('template_name')
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

    <script>
        document.getElementById('review_time_frame').addEventListener('change', function() {
            const nextReviewDateField = document.getElementById('next_review_date');
            const reviewTimeFrame = this.value;
            const currentDate = new Date();
            let nextReviewDate;

            if (reviewTimeFrame === '6 months') {
                nextReviewDate = new Date(currentDate.setMonth(currentDate.getMonth() + 6));
            } else if (reviewTimeFrame === 'yearly') {
                nextReviewDate = new Date(currentDate.setFullYear(currentDate.getFullYear() + 1));
            }

            nextReviewDateField.value = nextReviewDate.toISOString().split('T')[0];
        });

        document.getElementById('add_to_template').addEventListener('change', function() {
            const templateNameGroup = document.getElementById('template_name_group');
            templateNameGroup.classList.toggle('d-none', !this.checked);
        });
        $('#template').on('change', function() {

            var selectedTemplateValue = $(this).val();

            $.ajax({
                url: '/manager/risk_assessment/template',
                type: 'GET',
                data: {
                    template: selectedTemplateValue
                },
                success: function(data) {
                    $("#activity_issue").val(data.template.activity_issue);
                    $("#affected_persons").val(data.template.affected_persons);
                    $("#current_measures").val(data.template.current_measures);
                    $("#further_measures").val(data.template.further_measures);
                    $("#hazards_identified").val(data.template.hazards_identified);
                    $("#risk_level").val(data.template.risk_level).change();
                },
                error: function() {
                    alert('There was an error fetching events!');
                }
            });
        });
    </script>
@endsection
