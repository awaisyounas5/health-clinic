@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('company.incidents.view_investigations') }}">Incident Investigations </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">View Incident Investigations</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-block">
                        <h6 class="card-title text-bold">Incident Investigations</h6>
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="datatable table table-stripped dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr>
                                                    <th>Investigator</th>
                                                    <th>Result of Investigation</th>
                                                    <th>Location</th>
                                                    <th>Status</th>
                                                    <th>Date and Time</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($investigation_reports)
                                                @foreach ($investigation_reports as $report)

                                                <tr id="row{{$report->id}}">
                                                    <td>{{$report->name_of_investigator}}</td>
                                                    <td>{{$report->result_of_investigation}}</td>
                                                    <td>{{$report->location}}</td>
                                                    <td>{{strpos($report->status, '_') !== false ? ucwords(str_replace('_', ' ', $report->status)) : ucwords($report->status)}}</td>
                                                    <td>{{$report->investigation_date}} {{$report->investigation_time}}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle nav-link user-link" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <span>Action</span>
                                                            </a>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <li><a class="dropdown-item" href="{{route('company.incidents.view_investigation',$report->id)}}">View</a></li>
                                                                <li><a class="dropdown-item" href="{{ route('company.incidents.edit_investigation', $report->id) }}">Edit</a></li>
                                                                <li><a class="dropdown-item" onclick="deleteInvestigation({{$report->id}})">Delete</a></li>
                                                                <li><a class="dropdown-item" href="{{ route('company.incidents.create_action',$report->id) }}">Incident Action</a></li>
                                                            </ul>
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
</div>

<script>
    function deleteInvestigation($id) {
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
                    url: '/company/incidents/investigation_delete/' + $id,
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
