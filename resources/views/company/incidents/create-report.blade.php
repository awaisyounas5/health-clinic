@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('company.incidents.view_reports') }}">Incident
                                    Reports </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Create Incident Report</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="card-title">Enter Report Details</h4>
                        <form action="{{ route('company.incidents.store_report') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date" required>
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Time <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control" name="time" required>
                                    @error('time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-12">
                                    <label class="label">People Involved <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="people_involved"
                                        placeholder="Enter names of people involved" required>
                                        @error('people_involved')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-5">
                                    <label class="label">Position of Reporter <span class="text-danger">*</span></label>
                                    <select class="form-control" name="position" id="position"
                                        required>
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
                                    <a href="javascript:void(0)" class="btn btn-secondary btn-lg text-white"
                                    data-bs-toggle="modal" data-bs-target="#addPositionModal" href="javavoid()">+</a>
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
                                <div class="form-group mb-4 col-md-12">
                                    <label class="label">Name of Reporter <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name_of_reporter"
                                        placeholder="Enter name of reporter" required>
                                        @error('name_of_reporter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-12">
                                    <label class="label">Incident Details <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="incident_details" placeholder="Enter details of the incident" rows="4"
                                        required></textarea>
                                        @error('incident_details')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Severity of Incidents <span class="text-danger">*</span></label>
                                    <select class="form-control" name="severity_of_incidents" required>
                                        <option value="" disabled selected>Please Select</option>
                                        <option value="Low">Low</option>
                                        <option value="Medium">Medium</option>
                                        <option value="High">High</option>
                                    </select>
                                    @error('severity_of_incidents')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-5">
                                    <label class="label">Type of Incidents <span class="text-danger">*</span></label>
                                    <select class="form-control" name="type_of_incidents" id="incident_types" required>
                                        <option value="" disabled selected>Please Select</option>
                                        @if ($incident_types)
                                            @foreach ($incident_types as $incident_type)
                                                <option value="{{ $incident_type->title }}">{{ $incident_type->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('type_of_incidents')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-1" style="margin-top: 25px;">
                                    <a class="btn btn-secondary btn-lg text-white" data-bs-toggle="modal"
                                    data-bs-target="#addTypeModal">+</a>
                                </div>
                                <div class="form-group mb-4 col-md-5">
                                    <label class="label">Possible Trigger <span class="text-danger">*</span></label>
                                    <select class="form-control" name="possible_trigger" id="possible_trigger" required>
                                        <option value="" disabled selected>Please Select</option>
                                        @if ($triggers)
                                            @foreach ($triggers as $trigger)
                                                <option value="{{ $trigger->title }}">{{ $trigger->title }}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                    @error('possible_trigger')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-1" style="margin-top: 25px;">
                                    <a class="btn btn-secondary btn-lg text-white" data-bs-toggle="modal"
                                    data-bs-target="#addTriggerModal">+</a>
                                </div>
                                <div class="form-group mb-4 col-md-5">
                                    <label class="label">Recommendations <span class="text-danger">*</span></label>
                                    <select class="form-control" name="recommendations" id="recommendations" required>
                                        <option value="" disabled selected>Please Select</option>
                                        @if ($recommendations)
                                            @foreach ($recommendations as $recommendation)
                                                <option value="{{ $recommendation->title }}">{{ $recommendation->title }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('recommendations')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-1" style="margin-top: 25px;">
                                    <a class="btn btn-secondary btn-lg text-white" data-bs-toggle="modal"
                                    data-bs-target="#addRecommendationModal">+</a>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit Report</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
@include('company.incidents.modal.position')
@include('company.incidents.modal.recommendation')
    <div class="modal fade" id="addTypeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body p-md-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2 pb-1">Add Incident Type</h3>
                    </div>
                    <p>Enter a new incident type in your list</p>
                    <form id="typeForm" class="row g-3">
                        @csrf
                        <div class="col-12">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="newType" name="newType" class="form-control"
                                    placeholder="Enter Incident Type" required />
                                <label for="newType">Enter Incident Type <span class="text-danger">*</span></label>
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



    <div class="modal fade" id="addTriggerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body p-md-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2 pb-1">Add Trigger</h3>
                    </div>
                    <p>Enter a new trigger in your list</p>
                    <form id="triggerForm" class="row g-3">
                        @csrf
                        <div class="col-12">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="newTrigger" name="newTrigger" class="form-control"
                                    placeholder="Enter Trigger" required />
                                <label for="newTrigger">Enter Trigger <span class="text-danger">*</span></label>
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

        $("#triggerForm").on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/company/incidents/store_trigger',
                type: 'POST',
                data: $(this).serialize(),
                success: function(data) {

                    $("#addTriggerModal").modal('toggle');
                    $("#newTrigger").val('');
                    $("#possible_trigger").html(data.triggers);
                },
                error: function() {
                    alert('There was an error fetching events!');
                }
            });
        })
        $("#typeForm").on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/company/incidents/store_incident_type',
                type: 'POST',
                data: $(this).serialize(),
                success: function(data) {

                    $("#addTypeModal").modal('toggle');
                    $("#newType").val('');
                    $("#incident_types").html(data.incident_types);
                },
                error: function() {
                    alert('There was an error fetching events!');
                }
            });
        })
    </script>
@endsection
