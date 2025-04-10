@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-8 col-4">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('company.roaster') }}">Roaster </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Manage Roaster</li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-8 text-end m-b-30">
                        <button id="publish-roaster" class="btn btn-primary btn-rounded">Publish Roaster</button>
                        <button id="export-pdf" class="btn btn-primary btn-rounded">Export as PDF</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <select class="form-control" required style="width:300px;" id="team_id">
                                <option value="" disabled>Choose Team</option>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}" @selected($team->id == 1)>{{ $team->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box mb-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade none-border" id="event-modal">
                            <div class="modal-dialog">
                                <div class="modal-content modal-md">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create New Shift</h4>
                                        <button type="button" class="btn-close" onclick="closeEventModal()"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="create_event">
                                            @csrf
                                            <input type="hidden" name="start_date" id="start_date">
                                            <input type="hidden" name="team_id" id="team_id_model">
                                            <div class="form-group mb-2">
                                                <label class="label">Staff Member</label>
                                                <select class="form-control" id="staff_member" name="staff_id">
                                                    <option value="" selected disabled>Choose Staff Member</option>
                                                </select>
                                                <span class="text-danger" id="staff_id_error"></span>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="label">Shift Type</label>
                                                <select class="form-control" id="shift_type" name="shift_type_id">
                                                    <option value="" selected disabled>Choose Shift Type</option>
                                                </select>
                                                <span class="text-danger" id="shift_type_id_error"></span>
                                            </div>
                                            <div class="form-group mb-2 row">
                                                <div class="col-md-6">
                                                    <label class="label">Staff Pay Rate</label>
                                                    <select class="form-control" id="pay_rate" name="payrate_id">
                                                        <option value="" selected disabled>Choose Staff Pay Rate
                                                        </option>
                                                    </select>
                                                    <span class="text-danger" id="payrate_id_error"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="label">Shift Status</label>
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="" selected disabled>Choose Shift Status
                                                        </option>
                                                        <option value="A">Active</option>
                                                        <option value="D">Draft</option>
                                                    </select>
                                                    <span class="text-danger" id="status_error"></span>
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="label">Patient</label>
                                                <select class="form-control" name="patient_id" id="patient_id">
                                                    <option value="" selected disabled>Choose Patient</option>
                                                    @if ($patients)
                                                        @foreach ($patients as $patient)
                                                            <option value="{{ $patient->id }}">{{ $patient->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <span class="text-danger" id="patient_id_error"></span>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="label">Shift Color</label>
                                                <input class="form-control" type="color" id="colorInput"
                                                    name="background_color" list="colorPalettes">
                                                <datalist id="colorPalettes">
                                                    <option>#ff0000</option>
                                                    <option>#00ff00</option>
                                                    <option>#0000ff</option>
                                                    <option>#ffff00</option>
                                                    <option>#ff00ff</option>
                                                    <option>#00ffff</option>
                                                    <option>#800000</option>
                                                    <option>#ff4757</option>
                                                    <option>#57606f</option>
                                                    <option>#747d8c</option>
                                                    <option>#ffa502</option>
                                                    <option>#ff7f50</option>
                                                    <option>#2ed573</option>
                                                    <option>#ff6b81</option>
                                                    <option>#079992</option>
                                                    <option>#78e08f</option>
                                                    <option>#eb2f06</option>
                                                    <option>#f6b93b</option>
                                                </datalist>
                                                <span class="text-danger" id="background_color_error"></span>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="label">Extra Shift Information</label>
                                                <textarea class="form-control" name="extra_shift_info" id="extra_shift_info"></textarea>
                                                <span class="text-danger" id="extra_shift_info_error"></span>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="label">Shift End Time</label>
                                                <input type="date" class="form-control" name="end_time" id="end_time"
                                                    required>
                                                    <span class="text-danger" id="end_time_error"></span>
                                            </div>
                                            <div class="modal-footer text-center">
                                                <button type="submit"
                                                    class="btn btn-primary submit-btn save-event">Create
                                                    event</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade none-border" id="event-edit-modal">
                            <div class="modal-dialog">
                                <div class="modal-content modal-md">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Shift</h4>
                                        <button type="button" class="btn-close" onclick="closeEditModal()"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="edit_event">
                                            @csrf
                                            <input type="hidden" name="start_date" id="start_date_edit">
                                            <input type="hidden" name="team_id" id="team_id_model_edit">
                                            <input type="hidden" name="id" id="edit-id">
                                            <div class="form-group mb-2">
                                                <label class="label">Staff Member</label>
                                                <select class="form-control" id="staff_member_edit" name="staff_id">
                                                    <option value="" selected disabled>Choose Staff Member</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="label">Shift Type</label>
                                                <select class="form-control" id="shift_type_edit" name="shift_type_id">
                                                    <option value="" selected disabled>Choose Shift Type</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-2 row">
                                                <div class="col-md-6">
                                                    <label class="label">Staff Pay Rate</label>
                                                    <select class="form-control" id="pay_rate_edit" name="payrate_id">
                                                        <option value="" selected disabled>Choose Staff Pay Rate
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="label">Shift Status</label>
                                                    <select class="form-control" name="status" id="status_edit">
                                                        <option value="" selected disabled>Choose Shift Status
                                                        </option>
                                                        <option value="A">Active</option>
                                                        <option value="D">Draft</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="label">Patient</label>
                                                <select class="form-control" name="patient_id" id="patient_id_edit">
                                                    <option value="" selected disabled>Choose Patient</option>
                                                    @if ($patients)
                                                        @foreach ($patients as $patient)
                                                            <option value="{{ $patient->id }}">{{ $patient->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="label">Shift Color</label>
                                                <input class="form-control" type="color" id="background_color_edit"
                                                    name="background_color" list="colorPalettes">
                                                <datalist id="colorPalettes">
                                                    <option>#ff0000</option>
                                                    <option>#00ff00</option>
                                                    <option>#0000ff</option>
                                                    <option>#ffff00</option>
                                                    <option>#ff00ff</option>
                                                    <option>#00ffff</option>
                                                    <option>#800000</option>
                                                    <option>#ff4757</option>
                                                    <option>#57606f</option>
                                                    <option>#747d8c</option>
                                                    <option>#ffa502</option>
                                                    <option>#ff7f50</option>
                                                    <option>#2ed573</option>
                                                    <option>#ff6b81</option>
                                                    <option>#079992</option>
                                                    <option>#78e08f</option>
                                                    <option>#eb2f06</option>
                                                    <option>#f6b93b</option>
                                                </datalist>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="label">Extra Shift Information</label>
                                                <textarea class="form-control" name="extra_shift_info" id="extra_shift_info_edit"></textarea>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="label">Shift End Time</label>
                                                <input type="date" class="form-control" name="end_time"
                                                    id="end_time_edit" required>
                                            </div>
                                            <div class="modal-footer text-center">
                                                <button type="button" id="deleteEvent"
                                                    class="btn btn-danger submit-btn delete-event">Delete
                                                    event</button>
                                                <button type="submit"
                                                    class="btn btn-primary submit-btn save-event">Update
                                                    event</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

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
                    editable: true,
                    droppable: true,
                    dateClick: function(info) {
                        var clickedDate = new Date(info.dateStr);
                        var today = new Date();

                        clickedDate.setHours(0, 0, 0, 0);
                        today.setHours(0, 0, 0, 0);

                        if (clickedDate < today) {
                            Swal.fire({
                                title: "Could Not Create",
                                text: 'Sorry! You cannot select previous date',
                                icon: "error"
                            });
                            return;
                        }
                        openEventModal(info.dateStr);
                    },
                    events: [],

                    eventClick: function(info) {
                        if (info.event.id) {

                            console.log(info.event)
                            if (info.event.extendedProps.status == "complete") {
                                Swal.fire({
                                    title: "Success",
                                    text: 'Shift is completed',
                                    icon: "success",
                                    confirmButtonText: "View Note"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href =
                                            '/company/shift_note/view_details/' + info.event
                                            .id; // Replace with your actual URL
                                    }
                                });
                            } else {

                                openEventEditModal(info.event)
                            }
                        }
                    }

                });
                calendar.render();

                function fetchEvents(filter) {
                    $.ajax({
                        url: '/company/events',
                        type: 'GET',
                        data: {
                            filter: filter
                        },
                        success: function(data) {

                            $("#staff_member").html(data.staff_member);
                            $("#staff_member_edit").html(data.staff_member);
                            $("#shift_type").html(data.team_shift);
                            $("#shift_type_edit").html(data.team_shift);
                            calendar.removeAllEvents();
                            calendar.addEventSource(data.events);
                        },
                        error: function() {
                            alert('There was an error fetching events!');
                        }
                    });
                }

                $('#team_id').on('change', function() {
                    var selectedFilter = $(this).val();
                    $("#team_id_model").val(selectedFilter);
                    fetchEvents(selectedFilter);
                });
                $("#deleteEvent").on('click', function() {
                    id = $("#edit-id").val();
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
                                    'X-CSRF-TOKEN': $(
                                            'meta[name="csrf-token"]')
                                        .attr('content')
                                }
                            });
                            $.ajax({
                                type: 'DELETE',
                                url: '/company/roaster/delete/' + id,
                                data: {
                                    _token: @json(csrf_token()),
                                },
                                success: function(data) {
                                    closeEditModal();
                                    var event = calendar
                                        .getEventById(id);
                                    event.remove();
                                    if (data.status) {

                                        toastr.success(data
                                            .message, {
                                                progressBar: true
                                            });
                                        Swal.fire({
                                            title: "Deleted!",
                                            text: data
                                                .message,
                                            icon: "success"
                                        });
                                    } else {
                                        Swal.fire({
                                            title: "Not Deleted!",
                                            text: data
                                                .message,
                                            icon: "error"
                                        });
                                    }
                                }
                            });
                        }
                    });
                })

                var defaultSelected = $('#team_id').val();
                $("#team_id_model").val(defaultSelected);
                $("#publish-roaster").on('click', function() {
                    $team_id = $("#team_id").val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/company/roaster/publish_events/' + $team_id,
                        type: 'POST',
                        data: {
                            _token: @json(csrf_token()),
                        },
                        success: function(data) {
                            console.log(data)
                            calendar.removeAllEvents();
                            calendar.addEventSource(data.events);
                        },
                        error: function() {
                            alert('There was an error fetching events!');
                        }
                    });
                });
                $("#create_event").on('submit', function(e) {
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/company/roaster/event_store',
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(data) {
                            $("#staff_member").val('');
                            $("#shift_type").val('');
                            $("#pay_rate").val('');
                            $("#patient_id").val('');
                            $("#colorInput").val('');
                            $("#status").val('');
                            $("#extra_shift_info").val('');
                            $("#end_time").val('');
                            closeEventModal();
                            calendar.removeAllEvents();
                            calendar.addEventSource(data.events);
                        },
                        error: function(xhr, status, error) {
                            try {
                                var response = JSON.parse(xhr.responseText);
                                if (response.errors) {

                                    $.each(response.errors, function(key, value) {
                                        var errorMessage = "";
                                        $.each(value, function(index, message) {
                                            errorMessage += message + " ";
                                        });
                                        $('#' + key + '_error').text(errorMessage);
                                    });
                                } else {
                                    console.log("No errors found in the response.");
                                }
                            } catch (e) {
                                console.log("Error parsing response: " + e);
                            }
                        }
                    });
                })
                $("#edit_event").on('submit', function(e) {
                    e.preventDefault();
                    id = $("#edit-id").val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/company/roaster/event_edit/' + id,
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(data) {

                            closeEditModal();
                            calendar.removeAllEvents();
                            calendar.addEventSource(data.events);
                        },
                        error: function() {
                            alert('There was an error fetching events!');
                        }
                    });
                })
                fetchEvents(defaultSelected);


                function openEventModal(date = null) {

                    var modal = document.getElementById('event-modal');
                    var modalBackdrop = document.querySelector('.modal-backdrop');
                    var start_date = document.getElementById('start_date');
                    $(start_date).val(date);
                    if (!modal.classList.contains('show')) {
                        modal.classList.add('show');
                        modal.style.display = 'block';
                        document.body.classList.add('modal-open');

                        if (!modalBackdrop) {
                            modalBackdrop = document.createElement('div');
                            modalBackdrop.classList.add('modal-backdrop', 'fade', 'show');
                            document.body.appendChild(modalBackdrop);
                        }
                    }
                }

                function openEventEditModal(data = null) {
                    console.log(data)
                    fetchEvents(data.extendedProps.team_id);
                    setTimeout(function() {
                        var modal = document.getElementById('event-edit-modal');
                        var modalBackdrop = document.querySelector('.modal-backdrop');
                        var edit_id = document.getElementById('edit-id');
                        $(edit_id).val(data.id);
                        console.log(data.extendedProps.end_date);
                        document.getElementById("end_time_edit").value = data.extendedProps.end_date;
                        document.getElementById("start_date_edit").value = data.startStr;
                        $("#extra_shift_info_edit").val(data.extendedProps.extra_info);
                        $("#team_id_model_edit").val(data.extendedProps.team_id);
                        $("#background_color_edit").val(data.backgroundColor);
                        $("#background_color_edit").val(data.backgroundColor);
                        $("#patient_id_edit").val(data.extendedProps.patient_id).change();
                        $("#status_edit").val(data.extendedProps.status).change();
                        $("#staff_member_edit").val(data.extendedProps.staff_id).change();
                        $("#shift_type_edit").val(data.extendedProps.shift_type_id).change();
                        fetchPayRates(data.extendedProps.staff_id);

                        setTimeout(function() {
                            $("#pay_rate_edit").val(data.extendedProps.payrate_id).change()
                        }, 1000);
                        if (!modal.classList.contains('show')) {
                            modal.classList.add('show');
                            modal.style.display = 'block';
                            document.body.classList.add('modal-open');

                            if (!modalBackdrop) {
                                modalBackdrop = document.createElement('div');
                                modalBackdrop.classList.add('modal-backdrop', 'fade', 'show');
                                document.body.appendChild(modalBackdrop);
                            }
                        }
                    }, 1000);
                }
                $('#staff_member_edit').on('change', function() {

                    var selectedStaffMember = $(this).val();
                    fetchPayRates(selectedStaffMember)
                })
                $('#staff_member').on('change', function() {

                    var selectedStaffMember = $(this).val();
                    $.ajax({
                        url: '/company/pay_rates',
                        type: 'GET',
                        data: {
                            staff_member: selectedStaffMember
                        },
                        success: function(data) {
                            $("#pay_rate").html(data.pay_rates);
                            $("#pay_rate_edit").html(data.pay_rates);
                        },
                        error: function() {
                            alert('There was an error fetching events!');
                        }
                    });
                });

                function fetchPayRates(selectedStaffMember) {


                    $.ajax({
                        url: '/company/pay_rates',
                        type: 'GET',
                        data: {
                            staff_member: selectedStaffMember
                        },
                        success: function(data) {
                            $("#pay_rate").html(data.pay_rates);
                            $("#pay_rate_edit").html(data.pay_rates);
                        },
                        error: function() {
                            alert('There was an error fetching events!');
                        }
                    });
                }



            });

            function closeEventModal() {
                var modal = document.getElementById('event-modal');
                modal.classList.remove('show');
                modal.style.display = 'none';
                document.body.classList.remove('modal-open');

                var modalBackdrop = document.querySelector('.modal-backdrop');
                if (modalBackdrop) {
                    modalBackdrop.remove();
                }
            }

            function closeEditModal() {
                var modal = document.getElementById('event-edit-modal');
                modal.classList.remove('show');
                modal.style.display = 'none';
                document.body.classList.remove('modal-open');

                var modalBackdrop = document.querySelector('.modal-backdrop');
                if (modalBackdrop) {
                    modalBackdrop.remove();
                }
            }


            document.getElementById('export-pdf').addEventListener('click', function() {
                var calendarContainer = document.getElementById('calendar');

                if (calendarContainer) {
                    var opt = {
                        margin: [0, 0, 0, 0],
                        filename: 'calendar_export.pdf',
                        image: {
                            type: 'jpeg',
                            quality: 0.98
                        },
                        html2canvas: {
                            scale: 1.0,
                            useCORS: true
                        },
                        jsPDF: {
                            unit: 'mm',
                            format: 'a3',
                            orientation: 'landscape'
                        }
                    };

                    var clone = calendarContainer.cloneNode(true);

                    // Center the clone element
                    clone.style.display = 'block';
                    clone.style.transform = 'scale(1.2)';
                    clone.style.transformOrigin = 'top left';
                    clone.style.width = '90%';
                    clone.style.margin = '0 auto'; // Center the element horizontally

                    // Create a wrapper to ensure the calendar is centered
                    var wrapper = document.createElement('div');
                    wrapper.style.display = 'flex';
                    wrapper.style.justifyContent = 'center';
                    wrapper.appendChild(clone);

                    document.body.appendChild(wrapper);

                    html2pdf().from(clone).set(opt).save().finally(function() {
                        document.body.removeChild(wrapper);
                    });
                }
            });
        </script>
    @endsection
