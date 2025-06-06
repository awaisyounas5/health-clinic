@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('company.template')}}">Templates</a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Risk Assessments Templates</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-block">
                        <h6 class="card-title text-bold">Risk Assessment Template</h6>
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="datatable table table-stripped dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>Template Name</th>
                                                    <th>Activity/Issue</th>
                                                    <th>Hazards Identified</th>
                                                    <th>Affected Persons</th>
                                                    <th>Risk Level</th>
                                                    <th>Current Measures</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($templates)
                                                @foreach ($templates as $template)
                                                <tr>
                                                    <td>{{$template->title}}</td>
                                                    <td>{{$template->activity_issue}}</td>
                                                    <td>{{$template->hazards_identified}}</td>
                                                    <td>{{$template->affected_persons}}</td>
                                                    <td>{{$template->risk_level}}</td>
                                                    <td>{{$template->current_measures}}</td>
                                                    <td><a href="#" class="dropdown-toggle nav-link user-link" data-bs-toggle="dropdown">
                                                            <span>Action</span>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{route('company.risk_assessment.template_edit',$template->id)}}">Edit</a>
                                                            <a class="dropdown-item" onclick="deleteTemplate({{$template->id}})">Delete</a>

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
    function deleteTemplate(id) {
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
                    url: '/company/template/delete/' + id,
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
