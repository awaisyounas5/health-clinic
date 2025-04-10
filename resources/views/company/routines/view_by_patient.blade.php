@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('company.routines') }}">Routine Activities </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">View Routine Activities</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-block">
                        <h6 class="card-title text-bold">Routine Activities</h6>
                        <div class="table-responsive">
                            <table class="datatable table table-stripped dataTable no-footer">
                                <thead>
                                    <tr role="row">
                                        <th>#</th>
                                        <th>Activity Description</th>
                                        <th>Activity Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($routines as $routine)
                                    <tr id="row{{$routine->id}}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $routine->description }}</td>
                                        <td>{{ $routine->time }}</td>
                                        <td><a href="#" class="dropdown-toggle nav-link user-link" data-bs-toggle="dropdown">
                                                <span>Action</span>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('company.routines.edit', $routine->id) }}">Edit</a>
                                                <a class="dropdown-item" onclick="deleteRoutine({{ $routine->id }})">Delete</a>
                                            </div>

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


<script>
    function deleteRoutine($id) {
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
                    url: '/company/routines/delete/' + $id,
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
