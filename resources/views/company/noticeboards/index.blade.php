@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('company.noticeboard') }}">Noticeboard</a></li>
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
                        <h6 class="card-title text-bold">Notices</h6>
                        <div class="table-responsive">
                            <table class="datatable table table-stripped dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr role="row" >
                                        <th class="sorting_asc">#</th>
                                        <th class="sorting_asc">Notice Title</th>
                                        <th class="sorting_asc">Notice Description</th>
                                        <th class="sorting">Notice Date</th>
                                        <th class="sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($notices as $notice)
                                    <tr role="row" class="odd" id="row{{$notice->id}}">
                                        <td class="sorting_1">{{ $loop->iteration }}</td>
                                        <td class="sorting_1">{{ $notice->title }}</td>
                                        <td>{{ $notice->description }}</td>
                                        <td>{{ $notice->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="dropdown-toggle nav-link user-link" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span>Action</span>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <li><a class="dropdown-item" href="{{ route('company.noticeboard.edit', $notice->id) }}">Edit</a></li>
                                                    <li><a class="dropdown-item" onclick="deleteNotice({{ $notice->id }})">Delete</a></li>
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
<script>
    function deleteNotice($id) {
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
                    url: '/company/noticeboard/delete/' + $id,
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
