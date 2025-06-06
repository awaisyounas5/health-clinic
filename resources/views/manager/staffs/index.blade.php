@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.staff')}}">Staff </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">View All Staff</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-block">
                        <h6 class="card-title text-bold">Staff Members</h6>
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
                                                    <th class="sorting_asc">Team</th>
                                                    <th class="sorting">First Name</th>
                                                    <th class="sorting">Sur Name</th>
                                                    <th class="sorting">Email</th>
                                                    <th class="sorting">Address</th>
                                                    <th class="sorting">Position</th>
                                                    <th class="sorting">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($staffs)
                                                @foreach ($staffs as $staff )

                                                <tr role="row" class="odd" id="row{{$staff->id}}">
                                                    <td class="sorting_1">{{$loop->iteration}}</td>
                                                    <td class="sorting_1">{{$staff->team?$staff->team->title:null}}</td>
                                                    <td>{{$staff->name}}</td>
                                                    <td>{{$staff->surname}}</td>
                                                    <td>{{$staff->email}}</td>
                                                    <td>{{$staff->address}}</td>
                                                    <td>{{$staff->position}}</td>
                                                    <td><a href="#" class="dropdown-toggle nav-link user-link"
                                                        data-bs-toggle="dropdown">
                                                        <span>Action</span>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{route('manager.staff.view',$staff->id)}}">View</a>
                                                        <a class="dropdown-item" href="{{route('manager.staff.edit',$staff->id)}}">Edit</a>
                                                        <a class="dropdown-item" onclick="staffDelete({{$staff->id}})">Delete</a>
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
    function staffDelete($id) {
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
                    url: '/manager/staff/delete/' + $id,
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
