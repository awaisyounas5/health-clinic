@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('company.risk_assessment')}}">Audits</a></li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">New Audit</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-block">
                        <h6 class="card-title text-bold">New Audit</h6>
                        <form action="{{route('company.audit.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-4 col-sm-6">
                                    <label for="name">Audit Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" required placeholder="Enter Audit Name">
                                     @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-sm-6">
                                    <label for="name">Audit Location <span class="text-danger">*</span></label>
                                    <input type="text" name="location" id="location" class="form-control" required placeholder="Enter Audit Location">
                                     @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-4 col-sm-12">
                                    <label for="name">Audit Standard</label>
                                    <input type="text" name="standard[]" class="form-control" required placeholder="Enter Standard For Audit">
                                </div>
                            </div>
                            <div id="standardContainer"></div>
                            <div class="text-right">
                                <button type="button" class="btn btn-secondary"  id="addStandardButton">Add More Standards</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
        document.getElementById('addStandardButton').addEventListener('click', function () {
            var standardContainer = document.getElementById('standardContainer');
            var newStandardDiv = document.createElement('div');
            newStandardDiv.className = 'row mt-2';
            newStandardDiv.innerHTML = `
                <div class="form-group mb-4 col-sm-10">
                    <label for="name">Audit Standard</label>
                    <input type="text" name="standard[]" class="form-control" required placeholder="Enter Standard For Audit">
                </div>
                <div class="form-group mb-4 col-sm-2">
                    <button type="button" class="btn btn-danger removeStandardButton" style="margin-top:27px;">Remove</button>
                </div>
            `;
            standardContainer.appendChild(newStandardDiv);

            var removeButtons = document.querySelectorAll('.removeStandardButton');
            removeButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    this.parentElement.parentElement.remove();
                });
            });
        });
    </script>
@endsection
