@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Companies</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="card-block">
                            <h6 class="card-title text-bold">Companies</h6>

                            <div class="table-responsive">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="datatable table table-stripped dataTable no-footer"
                                                id="DataTables_Table_0" role="grid"
                                                aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="Name: activate to sort column descending"
                                                            style="width: 220.641px;">Name</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 356.531px;">Email</th>

                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            aria-label="Age: activate to sort column ascending"
                                                            style="width: 77.9531px;">Status</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            aria-label="Start date: activate to sort column ascending"
                                                            style="width: 153.531px;">Created Date</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 113.781px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($companies)
                                                        @foreach ($companies as $company)
                                                            <tr role="row" class="odd">
                                                                <td class="sorting_1">{{ @$company->name }}</td>
                                                                <td>{{ @$company->email }}</td>

                                                                <td>{{ @$company->status }}</td>
                                                                <td>{{ @$company->created_at }}</td>
                                                                <td><a href="#"
                                                                        class="dropdown-toggle nav-link user-link"
                                                                        data-bs-toggle="dropdown">
                                                                        <span>Action</span>
                                                                    </a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item"
                                                                            onclick="changeStatus({{ $company->id }},'approved')">Approved</a>
                                                                        <a class="dropdown-item"
                                                                            onclick="changeStatus({{ $company->id }},'rejected')">Rejected</a>
                                                                        <a class="dropdown-item"
                                                                            onclick="changeStatus({{ $company->id }},'expired')">Expired</a>

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
            function changeStatus($id, $string) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/admin/company/status/' + $id,
                    data: {
                        status: $string,
                        _token: @json(csrf_token()),
                    },

                    success: function(response) {
                        window.location.reload();
                    }
                });

            }
        </script>

    @endsection
