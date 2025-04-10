@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('manager.medications') }}">Medications List</a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">View Medications By Patient List</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-block">
                        <h6 class="card-title text-bold">Medications List</h6>
                        <div class="table-responsive">
                            <table class="datatable table table-stripped dataTable no-footer">
                                <thead>
                                    <tr role="row" >
                                        <th>#</th>
                                        <th>Medicine Name</th>
                                        <th>Medicine Dose</th>
                                        <th>Medicine Start Date</th>
                                        <th>Medicine End Date</th>
                                        <th>Drug Notes</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($medications as $medication)
                                    <tr id="row{{$medication->id}}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $medication->name }}</td>
                                        <td>{{ $medication->dose }}</td>
                                        <td>{{ $medication->start_date }}</td>
                                        <td>{{ $medication->end_date }}</td>
                                        <td>{{ $medication->notes }}</td>
                                        <td>
                                            <a href="#" class="dropdown-toggle nav-link user-link" data-bs-toggle="dropdown">
                                                <span>Action</span>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('manager.medications.edit', $medication->id) }}">Edit</a>
                                                <a class="dropdown-item" onclick="medicationDelete({{ $medication->id }})">Delete</a>
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

<script>
    function medicationDelete($id) {
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
                    url: '/manager/medications/delete/' + $id,
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
