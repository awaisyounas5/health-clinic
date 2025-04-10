@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">
                                {{ ucwords(str_replace('_', ' ', Auth::user()->getRoleNames()[0])) }} Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="good-morning-blk">
                <div class="row">
                    <div class="col-md-6">
                        <div class="morning-user">
                            <h2>Good Morning, <span>{{ ucwords(str_replace('_', ' ', Auth::user()->name)) }}</span></h2>
                            <p>Have a nice day at work</p>
                        </div>
                    </div>
                    <div class="col-md-6 position-blk">
                        <div class="morning-img">
                            <img src="{{ asset('assets/img/morning-img-01.png') }}" alt>
                        </div>
                    </div>
                </div>
            </div>
            @role('company')
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <div class="dash-boxs comman-flex-center">
                            <img src="{{ asset('assets/img/icons/calendar.svg') }}" alt>
                        </div>
                        <div class="dash-content dash-count">
                            <h4>Total Appointments</h4>
                            <h2><span class="counter-up">{{ $appointments ?? 0 }}</span></h2>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <div class="dash-boxs comman-flex-center">
                            <img src="{{ asset('assets/img/icons/profile-add.svg') }}" alt>
                        </div>
                        <div class="dash-content dash-count">
                            <h4>Patients</h4>
                            <h2><span class="counter-up">{{ $patients ?? 0 }}</span></h2>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <div class="dash-boxs comman-flex-center">
                            <img src="{{ asset('assets/img/icons/scissor.svg') }}" alt>
                        </div>
                        <div class="dash-content dash-count">
                            <h4>Total Staff</h4>
                            <h2><span class="counter-up">{{ $staffs ?? 0 }}</span></h2>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <div class="dash-boxs comman-flex-center">
                            <img src="{{ asset('assets/img/icons/empty-wallet.svg') }}" alt>
                        </div>
                        <div class="dash-content dash-count">
                            <h4>Total Teams</h4>
                            <h2><span class="counter-up">{{ $teams ?? 0 }}</span></h2>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6 col-xl-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title patient-visit">
                                <h4>Patient Visit by Gender</h4>
                                <div>
                                    <ul class="nav chat-user-total">
                                        <li><i class="fa fa-circle current-users" aria-hidden="true"></i>Male 75%
                                        </li>
                                        <li><i class="fa fa-circle old-users" aria-hidden="true"></i> Female 25%
                                        </li>
                                    </ul>
                                </div>
                                <div class="input-block mb-0">
                                    <select class="form-control select">
                                        <option>2022</option>
                                        <option>2021</option>
                                        <option>2020</option>
                                        <option>2019</option>
                                    </select>
                                </div>
                            </div>
                            <div id="patient-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6 col-xl-3 d-flex">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title">
                                <h4>Patient by Department</h4>
                            </div>
                            <div id="donut-chart-dash" class="chart-user-icon">
                                <img src="{{ asset('assets/img/icons/user-icon.svg') }}" alt>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12  col-xl-4">
                    <div class="card top-departments">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Top Reviews</h4>
                        </div>
                        <div class="card-body">
                            <div class="activity-top">
                                <div class="activity-boxs comman-flex-center">
                                    <img src="{{ asset('assets/img/icons/dep-icon-01.svg') }}" alt>
                                </div>
                                <div class="departments-list">
                                    <h4>Complaint</h4>
                                    <p>{{@$total_complaints}}</p>
                                </div>
                            </div>
                            <div class="activity-top">
                                <div class="activity-boxs comman-flex-center">
                                    <img src="{{ asset('assets/img/icons/dep-icon-02.svg') }}" alt>
                                </div>
                                <div class="departments-list">
                                    <h4>Compliment</h4>
                                    <p>{{@$total_compliment}}</p>
                                </div>
                            </div>
                            <div class="activity-top">
                                <div class="activity-boxs comman-flex-center">
                                    <img src="{{ asset('assets/img/icons/dep-icon-03.svg') }}" alt>
                                </div>
                                <div class="departments-list">
                                    <h4>Suggestion</h4>
                                    <p>{{@$total_suggestion}}</p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12  col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block">Upcoming Appointments</h4> <a href="{{ route('company.appointments') }}"
                                class="patient-views float-end">Show all</a>
                        </div>
                        <div class="card-body p-0 table-dash">
                            <div class="table-responsive">
                                <table class="table mb-0 border-0 datatable custom-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </th>
                                            <th>No</th>
                                            <th>Patient name</th>
                                            <th>Staff</th>
                                            <th>Time</th>
                                            <th>Disease</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($company_appointments)
                                            @foreach ($company_appointments as $company_appointment)
                                                <tr>
                                                    <td>
                                                        <div class="form-check check-tables">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="something">
                                                        </div>
                                                    </td>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $company_appointment->patient->name }}</td>
                                                    <td class="table-image appoint-doctor">
                                                        <img width="28" height="28" class="rounded-circle"
                                                            src="{{ asset('assets/img/profiles/avatar-02.jpg') }}" alt>
                                                        <h2>{{ $company_appointment->staff->name }}</h2>
                                                    </td>
                                                    <td class="appoint-time"><span>{{ $company_appointment->date }} at
                                                        </span>{{ $company_appointment->time }}</td>
                                                    <td><button
                                                            class="custom-badge status-green ">{{ $company_appointment->details }}</button>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                    class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('company.appointments.edit', $company_appointment->id) }}"><i
                                                                        class="fa-solid fa-pen-to-square m-r-5"></i>
                                                                    Edit</a>
                                                                <a class="dropdown-item" onclick="deleteAppointment({{ $company_appointment->id }})
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#delete_appointment"><i
                                                                        class="fa fa-trash-alt m-r-5"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title d-inline-block">Recent Audits </h4> <a href="{{route('company.audit')}}"
                                class="float-end patient-views">Show all</a>
                        </div>
                        <div class="card-block table-dash">
                            <div class="table-responsive">
                                <table class="table mb-0 border-0 datatable custom-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </th>
                                            <th class="sorting_asc">#</th>
                                            <th class="sorting_asc">Audit Name</th>
                                            <th class="sorting">Audit Location</th>
                                            <th class="sorting">Completed %</th>
                                            <th class="sorting">Status</th>
                                            <th class="sorting">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($audits)
                                        @foreach ($audits as $audit)

                                        <tr>
                                            <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </td>
                                            <td>{{$loop->iteration}}</td>
                                            <td class="table-image">
                                                {{$audit->name}}
                                            </td>
                                            <td>{{$audit->location}}</td>
                                            <td>{{$audit->completed}}</td>
                                            <td>{{strpos($audit->status, '_') !== false ? ucwords(str_replace('_', ' ', $audit->status)) : ucwords($audit->status)}}</td>
                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="{{route('company.audit.edit',$audit->id)}}"><i
                                                            class="fa-solid fa-pen-to-square m-r-5"></i>
                                                            Edit</a>
                                                            <a class="dropdown-item" onclick="deleteAudit({{$audit->id}})" data-bs-toggle="modal"
                                                            data-bs-target="#delete_appointment"><i
                                                            class="fa fa-trash-alt m-r-5"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endrole
            @role('staff_member')
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <div class="dash-boxs comman-flex-center">
                            <img src="{{ asset('assets/img/icons/calendar.svg') }}" alt>
                        </div>
                        <div class="dash-content dash-count">
                            <h4>Todays Shifts</h4>
                            <h2><span class="counter-up">{{ $staff_today_shifts ?? 0 }}</span></h2>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <div class="dash-boxs comman-flex-center">
                            <img src="{{ asset('assets/img/icons/calendar.svg') }}" alt>
                        </div>
                        <div class="dash-content dash-count">
                            <h4>Todays Appointments</h4>
                            <h2><span class="counter-up">{{ $staff_today_appointment ?? 0 }}</span></h2>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <div class="dash-boxs comman-flex-center">
                            <img src="{{ asset('assets/img/icons/calendar.svg') }}" alt>
                        </div>
                        <div class="dash-content dash-count">
                            <h4>Upcomming Appointments</h4>
                            <h2><span class="counter-up">{{ $staff_upcomming_appointment ?? 0 }}</span></h2>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title patient-visit">
                                <h4>Calendar</h4>


                            </div>
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>

            </div>
            @endrole

            @role('patient')
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <div class="dash-boxs comman-flex-center">
                            <img src="{{ asset('assets/img/icons/calendar.svg') }}" alt>
                        </div>
                        <div class="dash-content dash-count">
                            <h4>Todays Shifts</h4>
                            <h2><span class="counter-up">{{ $patient_today_shifts ?? 0 }}</span></h2>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <div class="dash-boxs comman-flex-center">
                            <img src="{{ asset('assets/img/icons/calendar.svg') }}" alt>
                        </div>
                        <div class="dash-content dash-count">
                            <h4>Todays Appointments</h4>
                            <h2><span class="counter-up">{{ $patient_today_appointment ?? 0 }}</span></h2>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <div class="dash-boxs comman-flex-center">
                            <img src="{{ asset('assets/img/icons/calendar.svg') }}" alt>
                        </div>
                        <div class="dash-content dash-count">
                            <h4>Upcomming Appointments</h4>
                            <h2><span class="counter-up">{{ $patient_upcomming_appointment ?? 0 }}</span></h2>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title patient-visit">
                                <h4>Calendar</h4>


                            </div>
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>

            </div>
            @endrole
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
        @role('staff_member')
        <script>
             $(document).ready(function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    themeSystem: 'bootstrap',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },

                    events: [],
                });
                calendar.render();

                function fetchEvents() {
                    $.ajax({
                        url: '/staff_member/events',
                        type: 'GET',

                        success: function(data) {
                            calendar.removeAllEvents();
                            calendar.addEventSource(data.events);
                        },
                        error: function() {
                            alert('There was an error fetching events!');
                        }
                    });
                }
                fetchEvents();
            });
        </script>
        @endrole
        @role('patient')
        <script>
             $(document).ready(function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    themeSystem: 'bootstrap',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },

                    events: [],
                });
                calendar.render();

                function fetchEvents() {
                    $.ajax({
                        url: '/patient/events',
                        type: 'GET',

                        success: function(data) {
                            calendar.removeAllEvents();
                            calendar.addEventSource(data.events);
                        },
                        error: function() {
                            alert('There was an error fetching events!');
                        }
                    });
                }
                fetchEvents();
            });
        </script>
        @endrole
        <script>
            function deleteAppointment($id) {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: 'DELETE',
                            url: '/company/appointments/delete/' + $id,
                            data: {
                                _token: @json(csrf_token()),
                            },
                            success: function(data) {
                                if (data.status) {
                                    setTimeout(function() {
                                    window.location.reload();
                                }, 5000);
                                    toastr.success(data.message, {
                                        progressBar: true
                                    });
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: data.message,
                                        icon: "success"
                                    });
                                } else {
                                    Swal.fire({
                                        title: "Not Deleted!",
                                        text: data.message,
                                        icon: "error"
                                    });
                                }
                            }
                        });
                    }
                });
            }
        </script>
        <script>
            function deleteAudit(id) {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: 'DELETE',
                            url: '/company/audit/delete/' + id,
                            data: {
                                _token: @json(csrf_token()),
                            },
                            success: function(data) {
                                if (data.status) {
                                    setTimeout(function() {
                                        window.location.reload();
                                    }, 5000);
                                    toastr.success(data.message, {
                                        progressBar: true
                                    });
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: data.message,
                                        icon: "success"
                                    });
                                } else {
                                    Swal.fire({
                                        title: "Not Deleted!",
                                        text: data.message,
                                        icon: "error"
                                    });
                                }
                            }
                        });
                    }
                });
            }
        </script>
    @endsection
