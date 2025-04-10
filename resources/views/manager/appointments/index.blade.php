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
                            <li class="breadcrumb-item active">View All</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="card-block">
                            <h6 class="card-title text-bold">Appointments</h6>
                            <div class="table-responsive">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="datatable table table-stripped dataTable no-footer"
                                                id="DataTables_Table_0" role="grid"
                                                aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th>#</th>
                                                        <th>Staff</th>
                                                        <th>Patient</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Details</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($appointments as $appointment)
                                                        <tr role="row" class="odd" id="row{{$appointment->id}}">
                                                            <td>{{ $appointment->id }}</td>
                                                            <td>{{ $appointment->staff->name }}</td>
                                                            <td>{{ $appointment->patient->name }}</td>
                                                            <td>{{ $appointment->date }}</td>
                                                            <td>{{ $appointment->time }}</td>
                                                            <td>{{ $appointment->details }}</td>

                                                            <td>
                                                                <div class="dropdown">
                                                                    <a class="dropdown-toggle nav-link user-link"
                                                                        href="#" role="button" id="dropdownMenuLink"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <span>Action</span>
                                                                    </a>
                                                                    <ul class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenuLink">
                                                                        <li><a class="dropdown-item"
                                                                                href="{{ route('manager.appointments.edit', $appointment->id) }}">Edit</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                onclick="deleteAppointment({{ $appointment->id }})">Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
                        url: '/manager/appointments/delete/' + $id,
                        data: {
                            _token: @json(csrf_token()),
                        },
                        success: function(data) {
                            if (data.status) {
                                $("#row"+$id).remove();
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
