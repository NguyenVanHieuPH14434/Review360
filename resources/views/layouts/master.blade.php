<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- Favicon icon-->
    <link
        rel="shortcut icon"
        type="image/png"
        href="{{ asset('assets/images/logos/favicon.png') }}"
    />

    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    <title>Modernize Bootstrap Admin</title>
    <!-- Owl Carousel  -->
    <link
        rel="stylesheet"
        href="{{ asset('assets/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}"
    />

    @vite(['resources/scss/app_style.scss'])
</head>

<body>
<!-- Preloader -->
<div class="preloader">
    <img
        src="{{ asset('assets/images/logos/favicon.png') }}"
        alt="loader"
        class="lds-ripple img-fluid"
    />
</div>
<div id="main-wrapper">
    <!-- Sidebar Start -->
@include('layouts.left_sidebar_vertical')
    <!--  Sidebar End -->
    <div class="page-wrapper">
        <!--  Header Start -->
@include('layouts.header')
        <!--  Header End -->

        @include('layouts.left_sidebar_horizontal')

        <div class="body-wrapper">
            <div class="container-fluid">
                @yield('breadcrumb')
                @yield('content')
            </div>
        </div>
        <script>
            function handleColorTheme(e) {
                $("html").attr("data-color-theme", e);
                $(e).prop("checked", !0);
            }
        </script>
    </div>
</div>
<div class="dark-transparent sidebartoggler"></div>
<!-- Import Js Files -->

<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/js/app.init.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

<script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>

@include('layouts.page_javascript')
@yield('script')
@vite(['resources/js/app_js.js'])
<script>
    $(document).ready(function (){
        $( '.hasSelect2' ).select2( {
            theme: 'bootstrap-5'
        });
        $(window).trigger('hashchange');
    });
    $(window).on('hashchange', function() {
        highlightActiveLink();
    });

    function highlightActiveLink() {
        var currentUrl = window.location.href;
        $('.sidebar-item').removeClass('active');

        $('.sidebar-item a').each(function() {
            var linkUrl = $(this).attr('href');
            if (currentUrl.indexOf(linkUrl) !== -1) {
                $(this).closest('li').children().addClass('active');
            }
        });
    }
</script>
</body>
</html>
