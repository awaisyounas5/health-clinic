@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.risk_assessment')}}">Risk Assessment</a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Risk Assessments by Patient</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-block">
                        <h6 class="card-title text-bold">Risk Assessment</h6>
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="datatable table table-stripped dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>Patient</th>
                                                    <th>Activity/Issue</th>
                                                    <th>Review Time Frame</th>
                                                    <th>Date Next Review</th>
                                                    <th>Risk Level</th>
                                                    <th>Reminder</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($risk_assessments)
                                                @foreach ($risk_assessments as $risk_assessment)
                                                <tr id="row{{$risk_assessment->id}}">
                                                    <td>{{$risk_assessment->patient->name}}</td>
                                                    <td>{{$risk_assessment->activity_issue}}</td>
                                                    <td>{{$risk_assessment->review_time_frame}}</td>
                                                    <td>{{$risk_assessment->next_review_date}}</td>
                                                    <td>{{$risk_assessment->risk_level}}</td>
                                                    <td>{{$risk_assessment->reminder_days}}</td>
                                                    <td><a href="#" class="dropdown-toggle nav-link user-link" data-bs-toggle="dropdown">
                                                            <span>Action</span>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{route('manager.risk_assessment.edit',$risk_assessment->id)}}">Edit</a>
                                                            <a class="dropdown-item" onclick="deleteRiskAssessment({{$risk_assessment->id}})">Delete</a>
                                                            <a class="dropdown-item" href="{{route('manager.risk_assessment.view_assessment',$risk_assessment->id)}}">View</a>
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
    function deleteRiskAssessment(id) {
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
                    url: '/manager/risk_assessment/delete/' + id,
                    data: {
                        _token: @json(csrf_token()),
                    },
                    success: function(data) {
                        if (data.status) {
                            $("#row"+id).remove();
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
