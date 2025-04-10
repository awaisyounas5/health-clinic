@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('company.incidents.view_investigations') }}">Incident Investigations</a>
                            </li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Create Incident Investigation</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="card-title">Enter Investigation Details</h4>
                        <form action="{{ route('company.incidents.store_investigation', $id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Date of Investigation <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date_of_investigation" required>
                                    @error('date_of_investigation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Time of Investigation <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control" name="time_of_investigation" required>
                                    @error('time_of_investigation')
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
                                    <label class="label">Position of Investigator <span class="text-danger">*</span></label>
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
                                <div class="form-group mb-4 col-md-6">
                                    <label class="label">Name of Investigator <span class="text-danger">*</span></label>
                                    <select class="form-control" name="name_of_investigator" required>
                                        <option value="" disabled selected>Please choose staff member</option>
                                        @if ($staffs)
                                            @foreach ($staffs as $staff)
                                                <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('name_of_investigator')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-12">
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
                                    <label class="label">Incident Details <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="incident_details" placeholder="Enter details of the incident" rows="4"
                                        required></textarea>
                                    @error('incident_details')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-5">
                                    <label class="label">Results of Investigation <span class="text-danger">*</span></label>
                                    <select class="form-control" name="results_of_investigation"
                                        id="results_of_investigation" required>
                                        <option value="" disabled selected>Please Select</option>
                                        @if ($results)
                                            @foreach ($results as $result)
                                                <option value="{{ $result->title }}">{{ $result->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('results_of_investigation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-1" style="margin-top: 25px;">
                                    <a class="btn btn-secondary btn-lg text-white" data-bs-toggle="modal"
                                        data-bs-target="#addResultsModal">+</a>
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
                                        href="#addRecommendationModal">+</a>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit Investigation</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('company.incidents.modal.position')
    @include('company.incidents.modal.recommendation')
    <div class="modal fade" id="addResultsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body p-md-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2 pb-1">Add Result</h3>
                    </div>
                    <p>Enter a new result in your list</p>
                    <form id="resultsForm" class="row g-3">
                        @csrf
                        <div class="col-12">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="newResult" name="newResult" class="form-control"
                                    placeholder="Enter Result" required />
                                <label for="newResult">Enter Result <span class="text-danger">*</span></label>
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
        $("#resultsForm").on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/company/incidents/store_result',
                type: 'POST',
                data: $(this).serialize(),
                success: function(data) {

                    $("#addResultsModal").modal('toggle');
                    $("#newResult").val('');
                    $("#results_of_investigation").html(data.results);
                },
                error: function() {
                    alert('There was an error fetching events!');
                }
            });
        })
    </script>
@endsection
