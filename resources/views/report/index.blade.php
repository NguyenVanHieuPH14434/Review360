@extends('layouts.master')
@section('breadcrumb')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="fw-semibold mb-8">Báo cáo đánh giá nhân viên theo kỳ</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Đánh giá nhân viên theo kỳ</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <style>
        .apexcharts-canvas{width: 100%!important;}
        .apexcharts-canvas svg{width: 100%!important;}
    </style>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Đánh giá nhân viên theo kỳ</h5>
                        </div>
                        <select class="form-select w-auto">
                            <option value="1">Kỳ đánh giá 12/2023</option>
                            <option value="2">Kỳ đánh giá 04/2023</option>
                            <option value="3">Kỳ đánh giá 12/2022</option>
                            <option value="4">Kỳ đánh giá 04/2023</option>
                        </select>
                    </div>
                    <div id="chart-bar-basic">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboards/dashboard.js') }}"></script>
    <script>
        // Basic Bar Chart -------> BAR CHART
        var options_basic = {
            series: [
                {
                    data: [12,4,5,6],
                },
            ],
            chart: {
                fontFamily: '"Nunito Sans", sans-serif',
                type: "bar",
                height: 350,
                toolbar: {
                    show: false,
                },
            },
            grid: {
                borderColor: "transparent",
            },
            colors: ["var(--bs-primary)"],
            plotOptions: {
                bar: {
                    horizontal: true,
                },
            },
            dataLabels: {
                enabled: false,
            },
            xaxis: {
                categories: [
                    "A",
                    "B",
                    "C",
                    "D",
                ],
                labels: {
                    style: {
                        colors: [
                            "#a1aab2",
                            "#a1aab2",
                            "#a1aab2",
                            "#a1aab2"
                        ],
                    },
                },
            },
            yaxis: {
                labels: {
                    style: {
                        colors: [
                            "#a1aab2",
                            "#a1aab2",
                            "#a1aab2",
                            "#a1aab2",
                            "#a1aab2",
                            "#a1aab2",
                            "#a1aab2",
                            "#a1aab2",
                            "#a1aab2",
                            "#a1aab2",
                            "#a1aab2",
                            "#a1aab2",
                            "#a1aab2",
                            "#a1aab2",
                        ],
                    },
                },
            },
            tooltip: {
                theme: "dark",
            },
        };

        var chart_bar_basic = new ApexCharts(
            document.querySelector("#chart-bar-basic"),
            options_basic
        );
        chart_bar_basic.render();
    </script>
@endsection
