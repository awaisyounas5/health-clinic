@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('manager.appointments') }}">Appointments</a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Update Appointment</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="card-title">Update Appointment Details</h4>
                        <form action="{{ route('manager.appointments.update', $appointment->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group mb-4">
                                    <label class="label">Choose Team: <span class="text-danger">*</span></label>
                                    <select class="form-control" name="team_id" id="team_id" required>
                                        <option value="" selected disabled>Please Choose Team</option>
                                        @foreach ($teams as $team)
                                            <option value="{{ $team->id }}"
                                                @selected($team->id == $appointment->team_id)>
                                                {{ $team->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('team_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Choose Staff: <span class="text-danger">*</span></label>
                                    <select class="form-control" name="staff_id" id="staff_id" required>
                                        <option value="" selected disabled>Please Choose Staff</option>
                                        @foreach ($staff as $staff_member)
                                            <option value="{{ $staff_member->id }}"
                                                {{ $appointment->staff_id == $staff_member->id ? 'selected' : '' }}>
                                                {{ $staff_member->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('staff_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Choose Patient: <span class="text-danger">*</span></label>
                                    <select class="form-control" name="patient_id" required>
                                        <option value="" selected disabled>Please Choose Patient</option>
                                        @foreach ($patients as $patient)
                                            <option value="{{ $patient->id }}"
                                                {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>
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
                                    <label class="label">Appointment Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date"
                                        value="{{ $appointment->date }}" required>
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Appointment Time <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control" name="time"
                                        value="{{ $appointment->time }}" required>
                                    @error('details')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label class="label">Appointment Details <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="details">{{ $appointment->details }}</textarea>
                                    @error('details')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update Appointment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var currentStaffId = {{ $appointment->staff_id }};
    </script>
    <script>
        $(document).ready(function() {
            function fetchStaffByTeam(teamId) {
                if (teamId) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('manager.appointments.getStaffByTeam') }}",
                        data: {
                            team_id: teamId
                        },
                        success: function(res) {
                            if (res) {
                                $("#staff_id").empty();
                                $("#staff_id").append('<option value="" selected disabled>Please Choose Staff</option>');
                                $.each(res, function(key, value) {
                                    console.log(value.id, value.name); // Check if the values are correct
                                    var selected = value.id == currentStaffId ? 'selected' : '';
                                    $("#staff_id").append('<option value="' + value.id + '" ' + selected + '>' + value.name + '</option>');
                                });
                            } else {
                                $("#staff_id").empty();
                            }
                        }
                    });
                } else {
                    $("#staff_id").empty();
                }
            }

            // Call the function on page load
            var initialTeamId = $('#team_id').val();
            fetchStaffByTeam(initialTeamId);

            // Call the function on team_id change
            $('#team_id').change(function() {
                var teamId = $(this).val();
                fetchStaffByTeam(teamId);
            });
        });
    </script>

@endsection
