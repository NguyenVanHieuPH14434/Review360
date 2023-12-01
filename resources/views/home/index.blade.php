@extends('layouts.master')
@section('content')
    <style>
        .apexcharts-canvas{width: 100%!important;}
        .apexcharts-canvas svg{width: 100%!important;}
    </style>
    <!--  Owl carousel -->
    <div class="owl-carousel counter-carousel owl-theme">
        <div class="item">
            <div
                class="card border-0 zoom-in bg-primary-subtle shadow-none"
            >
                <div class="card-body">
                    <div class="text-center">
                        <img
                            src="{{ asset('assets/images/svgs/icon-user-male.svg') }}"
                            width="50"
                            height="50"
                            class="mb-3"
                            alt=""
                        />
                        <p class="fw-semibold fs-3 text-primary mb-1">
                            Nhân viên
                        </p>
                        <h5 class="fw-semibold text-primary mb-0">30</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div
                class="card border-0 zoom-in bg-warning-subtle shadow-none"
            >
                <div class="card-body">
                    <div class="text-center">
                        <img
                            src="{{ asset('assets/images/svgs/icon-briefcase.svg') }}"
                            width="50"
                            height="50"
                            class="mb-3"
                            alt=""
                        />
                        <p class="fw-semibold fs-3 text-warning mb-1">Kỳ đánh giá</p>
                        <h5 class="fw-semibold text-warning mb-0">15</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card border-0 zoom-in bg-info-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img
                            src="{{ asset('assets/images/svgs/icon-mailbox.svg') }}"
                            width="50"
                            height="50"
                            class="mb-3"
                            alt=""
                        />
                        <p class="fw-semibold fs-3 text-info mb-1">Nhân viên chưa đánh giá</p>
                        <h5 class="fw-semibold text-info mb-0">10</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card border-0 zoom-in bg-danger-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img
                            src="{{ asset('assets/images/svgs/icon-favorites.svg') }}"
                            width="50"
                            height="50"
                            class="mb-3"
                            alt=""
                        />
                        <p class="fw-semibold fs-3 text-danger mb-1">Xếp loại A</p>
                        <h5 class="fw-semibold text-danger mb-0">5</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div
                class="card border-0 zoom-in bg-success-subtle shadow-none"
            >
                <div class="card-body">
                    <div class="text-center">
                        <img
                            src="{{ asset('assets/images/svgs/icon-speech-bubble.svg') }}"
                            width="50"
                            height="50"
                            class="mb-3"
                            alt=""
                        />
                        <p class="fw-semibold fs-3 text-success mb-1">Số nhân viên mới</p>
                        <h5 class="fw-semibold text-success mb-0">2</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card border-0 zoom-in bg-info-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img
                            src="{{ asset('assets/images/svgs/icon-connect.svg') }}"
                            width="50"
                            height="50"
                            class="mb-3"
                            alt=""
                        />
                        <p class="fw-semibold fs-3 text-info mb-1">Nhân viên đạt mục tiêu</p>
                        <h5 class="fw-semibold text-info mb-0">12</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <div
                        class="d-sm-flex d-block align-items-center justify-content-between mb-9"
                    >
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Đánh giá performance qua các kỳ</h5>
                            <p class="card-subtitle mb-0">Tổng quan về các kỳ đánh giá</p>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div id="chart-bar-stacked"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <!-- Yearly Breakup -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h5 class="card-title mb-9 fw-semibold">
                                        Nhân viên loại A
                                    </h5>
                                    <h4 class="fw-semibold mb-3">9</h4>
                                    <div class="d-flex align-items-center mb-3">
                              <span
                                  class="me-1 rounded-circle bg-success-subtle round-20 d-flex align-items-center justify-content-center"
                              >
                                <i class="ti ti-arrow-up-left text-success"></i>
                              </span>
                                        <p class="text-dark me-1 fs-3 mb-0">+12%</p>
                                        <p class="fs-3 mb-0">so với kỳ trước</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="me-4">
                                <span
                                    class="round-8 text-bg-primary rounded-circle me-2 d-inline-block"
                                ></span>
                                            <span class="fs-2">12/2023</span>
                                        </div>
                                        <div>
                                <span
                                    class="round-8 bg-primary-subtle rounded-circle me-2 d-inline-block"
                                ></span>
                                            <span class="fs-2">04/2023</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-center">
                                        <div id="breakup"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6">
                    <!-- Monthly Earnings -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-start">
                                <div class="col-8">
                                    <h5 class="card-title mb-9 fw-semibold">
                                        Nhân viên loại D
                                    </h5>
                                    <h4 class="fw-semibold mb-3">2</h4>
                                    <div class="d-flex align-items-center pb-1">
                              <span
                                  class="me-2 rounded-circle bg-danger-subtle round-20 d-flex align-items-center justify-content-center"
                              >
                                <i
                                    class="ti ti-arrow-down-right text-danger"
                                ></i>
                              </span>
                                        <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                        <p class="fs-3 mb-0">So với kỳ trước</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-end">
                                        <div
                                            class="text-white text-bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center"
                                        >
                                            <i class="ti ti-chart-area fs-6"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="earning"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Row 2 -->
    <div class="row">
        <!-- Employee Salary -->
        <!-- Top Performers -->
        <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <div
                        class="d-sm-flex d-block align-items-center justify-content-between mb-7"
                    >
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Top Performers</h5>
                            <p class="card-subtitle mb-0">Best Employees</p>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle text-nowrap mb-0">
                            <thead>
                            <tr class="text-muted fw-semibold">
                                <th scope="col" class="ps-0">Nhân viên</th>
                                <th scope="col">Phòng Ban</th>
                                <th scope="col">Xếp loại</th>
                                <th scope="col">Performance</th>
                            </tr>
                            </thead>
                            <tbody class="border-top">
                            <tr>
                                <td class="ps-0">
                                    <div class="d-flex align-items-center">
                                        <div class="me-2 pe-1">
                                            <img
                                                src="{{ asset('assets/images/profile/user-1.jpg') }}"
                                                class="rounded-circle"
                                                width="40"
                                                height="40"
                                                alt=""
                                            />
                                        </div>
                                        <div>
                                            <h6 class="fw-semibold mb-1">Võ Hồng Nghiệp</h6>
                                            <p class="fs-2 mb-0 text-muted">
                                                Web Developer
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 fs-3">Thor Division</p>
                                </td>
                                <td>
                              <span
                                  class="badge fw-semibold py-1 w-85 bg-primary-subtle text-primary"
                              >A</span
                              >
                                </td>
                                <td>
                                    <p class="fs-3 text-dark mb-0">5</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-0">
                                    <div class="d-flex align-items-center">
                                        <div class="me-2 pe-1">
                                            <img
                                                src="{{ asset('assets/images/profile/user-2.jpg') }}"
                                                class="rounded-circle"
                                                width="40"
                                                height="40"
                                                alt=""
                                            />
                                        </div>
                                        <div>
                                            <h6 class="fw-semibold mb-1">Nguyễn Văn Hiếu</h6>
                                            <p class="fs-2 mb-0 text-muted">
                                                Web Developer
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 fs-3">Thor Division</p>
                                </td>
                                <td>
                              <span
                                  class="badge fw-semibold py-1 w-85 bg-warning-subtle text-warning"
                              >A</span
                              >
                                </td>
                                <td>
                                    <p class="fs-3 text-dark mb-0">4.7</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-0">
                                    <div class="d-flex align-items-center">
                                        <div class="me-2 pe-1">
                                            <img
                                                src="{{ asset('assets/images/profile/user-3.jpg') }}"
                                                class="rounded-circle"
                                                width="40"
                                                height="40"
                                                alt=""
                                            />
                                        </div>
                                        <div>
                                            <h6 class="fw-semibold mb-1">Hoàng Thị Tiến</h6>
                                            <p class="fs-2 mb-0 text-muted">
                                                Web Manager
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 fs-3">Thor Division</p>
                                </td>
                                <td>
                              <span
                                  class="badge fw-semibold py-1 w-85 bg-info-subtle text-info"
                              >A</span
                              >
                                </td>
                                <td>
                                    <p class="fs-3 text-dark mb-0">4.5</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-0">
                                    <div class="d-flex align-items-center">
                                        <div class="me-2 pe-1">
                                            <img
                                                src="{{ asset('assets/images/profile/user-4.jpg') }}"
                                                class="rounded-circle"
                                                width="40"
                                                height="40"
                                                alt=""
                                            />
                                        </div>
                                        <div>
                                            <h6 class="fw-semibold mb-1">Nguyễn Đình Hoàng</h6>
                                            <p class="fs-2 mb-0 text-muted">
                                                Project Manager
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 fs-3">Thor Division</p>
                                </td>
                                <td>
                              <span
                                  class="badge fw-semibold py-1 w-85 bg-success-subtle text-success"
                              >A</span
                              >
                                </td>
                                <td>
                                    <p class="fs-3 text-dark mb-0">4.4</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="border-0 ps-0">
                                    <div class="d-flex align-items-center">
                                        <div class="me-2 pe-1">
                                            <img
                                                src="{{ asset('assets/images/profile/user-5.jpg') }}"
                                                class="rounded-circle"
                                                width="40"
                                                height="40"
                                                alt=""
                                            />
                                        </div>
                                        <div>
                                            <h6 class="fw-semibold mb-1">Nguyễn Văn Hưng</h6>
                                            <p class="fs-2 mb-0 text-muted">
                                                Content Writer
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="border-0">
                                    <p class="mb-0 fs-3">Thor Division</p>
                                </td>
                                <td class="border-0">
                              <span
                                  class="badge fw-semibold py-1 w-85 bg-danger-subtle text-danger"
                              >A</span
                              >
                                </td>
                                <td class="border-0">
                                    <p class="fs-3 text-dark mb-0">4.3</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex align-items-strech">
            <div class="card text-bg-primary border-0 w-100">
                <div class="card-body pb-0">
                    <h5 class="fw-semibold mb-1 text-white card-title">
                        Excellent staff
                    </h5>
                    <p class="fs-3 mb-3 text-white">12/2023</p>
                    <div class="text-center mt-3">
                        <img
                            src="{{ asset('assets/images/backgrounds/piggy.png') }}"
                            class="img-fluid"
                            alt=""
                        />
                    </div>
                </div>
                <div class="card mx-2 mb-2 mt-n2">
                    <div class="card-body">
                        <div class="mb-7 pb-1">
                            <div
                                class="d-flex justify-content-between align-items-center mb-6"
                            >
                                <div>
                                    <h6 class="mb-1 fs-4 fw-semibold">Võ Hồng Nghiệp</h6>
                                    <p class="fs-3 mb-0">5</p>
                                </div>
                                <div>
                            <span
                                class="badge bg-primary-subtle text-primary fw-semibold fs-3"
                            >100%</span
                            >
                                </div>
                            </div>
                            <div
                                class="progress bg-primary-subtle"
                                style="height: 4px"
                            >
                                <div
                                    class="progress-bar w-50"
                                    role="progressbar"
                                    aria-valuenow="100"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                ></div>
                            </div>
                        </div>
                        <div>
                            <div
                                class="d-flex justify-content-between align-items-center mb-6"
                            >
                                <div>
                                    <h6 class="mb-1 fs-4 fw-semibold">Nguyễn Văn Hiếu</h6>
                                    <p class="fs-3 mb-0">4.7</p>
                                </div>
                                <div>
                            <span
                                class="badge bg-secondary-subtle text-secondary fw-bold fs-3"
                            >87%</span
                            >
                                </div>
                            </div>
                            <div
                                class="progress bg-secondary-subtle"
                                style="height: 4px"
                            >
                                <div
                                    class="progress-bar text-bg-secondary w-25"
                                    role="progressbar"
                                    aria-valuenow="87"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                ></div>
                            </div>
                        </div>
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
        // Stacked Bar Chart -------> BAR CHART
        var options_stacked = {
            series: [
                {
                    name: "Loại A",
                    data: [5,5,6,9],
                },
                {
                    name: "Loại B",
                    data: [23,20,22,14],
                },
                {
                    name: "Loại C",
                    data: [3,2,3,5],
                },
                {
                    name: "Loại D",
                    data: [5,3,3,2]
                },
            ],
            chart: {
                fontFamily: '"Nunito Sans", sans-serif',
                type: "bar",
                height: 350,
                stacked: true,
                toolbar: {
                    show: false,
                },
            },
            grid: {
                borderColor: "transparent",
            },
            colors: ["var(--bs-primary)", "var(--bs-secondary)", "#ffae1f", "#fa896b", "#39b69a"],
            plotOptions: {
                bar: {
                    horizontal: true,
                },
            },
            stroke: {
                width: 1,
                colors: ["#fff"],
            },
            xaxis: {
                categories: ["04/2022", "12/2022", "04/2023", "12/2023"],
                labels: {
                    formatter: function (val) {
                        return val;
                    },
                    style: {
                        colors: [
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
            yaxis: {
                title: {
                    text: undefined,
                },
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
                        ],
                    },
                },
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val;
                    },
                },
                theme: "dark",
            },
            fill: {
                opacity: 1,
            },
            legend: {
                position: "top",
                horizontalAlign: "left",
                offsetX: 40,
                labels: {
                    colors: ["#a1aab2"],
                },
            },
        };

        var chart_bar_stacked = new ApexCharts(
            document.querySelector("#chart-bar-stacked"),
            options_stacked
        );
        chart_bar_stacked.render();
    </script>
@endsection
