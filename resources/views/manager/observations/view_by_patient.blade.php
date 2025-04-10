@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.observation')}}">Observation List </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">View Observations List</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-block">
                        <h6 class="card-title text-bold">Observations List</h6>
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="datatable table table-stripped dataTable no-footer"
                                            id="DataTables_Table_0" role="grid"
                                            aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc">#</th>
                                                    <th class="sorting">Respiratory Rate</th>
                                                    <th class="sorting">Temperature</th>
                                                    <th class="sorting">SPO2 Level</th>
                                                    <th class="sorting">Inspired O2 %</th>
                                                    <th class="sorting">Blood Pressure</th>
                                                    <th class="sorting">Heart Beat Rate</th>
                                                    <th class="sorting">Conscious Level</th>
                                                    <th class="sorting">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($observations)
                                                @foreach ($observations as $observation)
                                                <tr role="row" class="odd" id="row{{$observation->id}}">
                                                    <td class="sorting_1">{{$loop->iteration }}</td>
                                                    <td class="sorting_1">{{$observation->respiratory_rate}}</td>
                                                    <td>{{$observation->body_temperature}}</td>
                                                    <td>{{$observation->spo2_level}}</td>
                                                    <td>{{$observation->inspired_o2}}</td>
                                                    <td>{{$observation->blood_pressure_level}}</td>
                                                    <td>{{$observation->heart_beat_rate}}</td>
                                                    <td>{{$observation->concious_level}}</td>
                                                    <td><a href="#" class="dropdown-toggle nav-link user-link"
                                                        data-bs-toggle="dropdown">
                                                        <span>Action</span>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{route('manager.observation.edit',$observation->id)}}">Edit</a>
                                                        <a class="dropdown-item" onclick="deleteObservation({{$observation->id}})">Delete</a>
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
                </div>
            </div>
        </div>
    </div>


    <script>
        function deleteObservation($id) {
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
                        url: '/manager/observation/delete/' + $id,
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
