@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('company.incidents.view_actions') }}">Incident
                                    Actions </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Create Incident Action</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="card-title">Enter Action Details</h4>
                        <form action="{{ route('company.incidents.store_action', $id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Date of Action <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date_of_action" required>
                                    @error('date_of_action')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Time of Action <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control" name="time_of_action" required>
                                    @error('time_of_action')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Time Frame of Completion <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="time_frame_of_completion" required>
                                    @error('time_frame_of_completion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">People Involved <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="people_involved"
                                        placeholder="Enter names of people involved" required>
                                        @error('people_involved')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Location <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="location" placeholder="Enter location"
                                        required>
                                        @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Name of Action Lead <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name_of_action_lead"
                                        placeholder="Enter name of action lead" required>
                                        @error('name_of_action_lead')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-5">
                                    <label class="label">Position of Action Lead <span class="text-danger">*</span></label>
                                    <select class="form-control" name="position" id="position" required>
                                        <option value="" disabled selected>Please Select</option>
                                        @if ($positions)
                                            @foreach ($positions as $position)
                                                <option value="{{ $position->title }}">{{ $position->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-1" style="margin-top: 25px;">
                                    <a class="btn btn-secondary btn-lg text-white" data-bs-toggle="modal"
                                        data-bs-target="#addPositionModal">+</a>
                                </div>
                                <div class="form-group mb-4 col-md-5">
                                    <label class="label">Action Plans <span class="text-danger">*</span></label>
                                    <select class="form-control" name="action_plans" id="action_plans" required>
                                        <option value="" disabled selected>Please Select</option>
                                        @if ($action_plans)
                                            @foreach ($action_plans as $action_plan)
                                                <option value="{{ $action_plan->title }}">{{ $action_plan->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('action_plans')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-1" style="margin-top: 25px;">
                                    <a class="btn btn-secondary btn-lg text-white" data-bs-toggle="modal"
                                        data-bs-target="#addActionPlanModal">+</a>
                                </div>
                                <div class="form-group mb-4 col-md-12">
                                    <label class="label">Action Plan Achievement <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="action_plan_achievement" placeholder="Describe the achievement of the action plan"
                                        rows="4" required></textarea>
                                        @error('action_plan_achievement')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-5">
                                    <label class="label">Action Plan Status <span class="text-danger">*</span></label>
                                    <select class="form-control" name="action_plan_status" required>
                                        <option value="" disabled selected>Please Select</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                    @error('action_plan_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit Action</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('company.incidents.modal.position')
    <div class="modal fade" id="addActionPlanModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body p-md-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2 pb-1">Add Action Plan</h3>
                    </div>
                    <p>Enter a new action plan in your list</p>
                    <form id="actionPlanForm" class="row g-3">
                        @csrf
                        <div class="col-12">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="newActionPlan" name="newActionPlan" class="form-control"
                                    placeholder="Enter Action Plan" required />
                                <label for="newActionPlan">Enter Action Plan <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#actionPlanForm").on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/company/incidents/store_action_plan',
                type: 'POST',
                data: $(this).serialize(),
                success: function(data) {

                    $("#addActionPlanModal").modal('toggle');
                    $("#newActionPlan").val('');
                    $("#action_plans").html(data.action_plans);
                },
                error: function() {
                    alert('There was an error fetching events!');
                }
            });
        })
    </script>
@endsection
