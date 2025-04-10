@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('manager.competency.passed') }}">Audits</a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">View Passed Audits</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="card-block">
                            <h6 class="card-title text-bold">Passed Audits</h6>
                            <div id="passed_competencies">
                                <canvas id="competencyChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Dummy data
        var dummyData = [{
                start_date: "2023-01-01",
                competency_percentage: 75,
                audit_name: "Audit A",
                audit_location: "Location 1"
            },
            {
                start_date: "2023-02-01",

                competency_percentage: 85,
                audit_name: "Audit B",
                audit_location: "Location 2"
            },
            {
                start_date: "2023-03-01",

                competency_percentage: 90,
                audit_name: "Audit C",
                audit_location: "Location 3"
            },
            {
                start_date: "2023-04-01",
                competency_percentage: 80,
                audit_name: "Audit D",
                audit_location: "Location 4"
            },
            {
                start_date: "2023-05-01",
                competency_percentage: 70,
                audit_name: "Audit E",
                audit_location: "Location 5"
            }
        ];

        // Function to create a chart
        function createChart(data) {
            var ctx = document.getElementById('competencyChart').getContext('2d');

            // Ensure that data is an array and has at least one record
            if (Array.isArray(data) && data.length > 0) {
                var labels = data.map(record => `${record.start_date}`);
                var values = data.map(record => record.competency_percentage);

                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Audits',
                            data: values,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 100
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Competency Chart',
                                font: {
                                    size: 18
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        var label = context.dataset.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        label +=
                                            `${data[context.dataIndex].audit_name} - ${data[context.dataIndex].audit_location}`;
                                        return label;
                                    }
                                }
                            }
                        }
                    }
                });
            } else {
                // Log an error if there is an issue with the data
                console.error("Invalid data format or no records found.");
            }
        }



        $(document).ready(function() {
            $.ajax({
                    type: 'GET',
                    url: '/manager/competency/passed/get_passed_data',
                    data: {
                        _token: @json(csrf_token()),
                    },
                    success: function(data) {
                        console.log(data.audit_passed_data);
                        createChart(data.audit_passed_data);
                    }
                });
        });
    </script>
@endsection
