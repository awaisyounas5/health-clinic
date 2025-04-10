@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.risk_assessment')}}">Risk Assessments</a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">View Assessments</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-block">
                        <h6 class="card-title text-bold">Risk Assessments</h6>
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="datatable table table-stripped dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc">#</th>
                                                    <th class="sorting_asc">Patient</th>
                                                    <th class="sorting">Total Number Of Risk Assessments</th>
                                                    <th class="sorting">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($risk_assessments)
                                                @foreach ($risk_assessments as $risk_assessment)
                                                <tr role="row" class="odd">
                                                    <td>{{@$loop->iteration}}</td>
                                                    <td>{{@$risk_assessment->patient->name}}</td>
                                                    <td>{{$risk_assessment->total}}</td>
                                                    <td>
                                                        <a href="{{ route('manager.risk_assessment.view',$risk_assessment->patient_id)}}" class="btn btn-primary btn-sm">View</a>
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


@endsection
