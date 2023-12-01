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
