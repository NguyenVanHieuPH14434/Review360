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

    <title>Nền tảng đánh giá nhân viên Thor Review</title>
    <!-- Owl Carousel  -->
    <link
        rel="stylesheet"
        href="{{ asset('assets/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}"
    />
    <!-- Datepicker  -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.min.css') }}"/>

    @vite(['resources/scss/app_style.scss'])
    <style>
        /* Overrides the text wrapper inside of the input box */
        li[class="select2-search select2-search--inline"] {
            margin-left:10px;
        }
        .select2-results__option[aria-selected=true] {
            display: none;
        }
    </style>
    @yield('styles')
</head>
<?php
$user = \App\Models\User::find(auth()->user()->id);
?>
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
<script src="{{asset('assets/libs/bootstrap-datepicker/dist/js/boostrap-datepicker.min.js')}}"></script>

@include('layouts.page_javascript')
@yield('script')
@vite(['resources/js/app_js.js'])
<script>
    $(document).ready(function (){
        $( '.hasSelect2' ).select2({
            theme: 'bootstrap-5',
        });
        $(window).trigger('hashchange');
        $(".datepicker" ).datepicker({
            todayHighlight: true,
            format: 'dd/mm/yyyy'
        });
        addPlaceholderSelect2Multiple();

        $('body').on('click', 'div.toggle-search', function(e) {
            $(this).closest('div.head-search').find('div.body-search').toggleClass("d-none d-block");
            addPlaceholderSelect2Multiple();
            $(this).closest('div.position-relative').find('i:last').toggleClass("ti-chevron-down ti-chevron-up");
            if($(this).closest('div.head-search').find('div.body-search').hasClass('d-none')){
                localStorage.removeItem('block-body-search');
            }else{
                localStorage.setItem('block-body-search', 'active');
            }
        });

        $(".hasSelect2").on("select2:unselect", () => {
            $eventSelect.on("select2:open", () => {
                $(".select2-search__field").val("");
            })
        })
        $(".reset-form-search").on('click', function() {
            $(this).closest('form')[0].reset();
            $(this).closest('form').find(':input').val('');
            $(this).closest('form').find('input.datepicker').val('');
            $(this).closest('form').find('select:not(.hasSelect2)').prop('selectedIndex', 0);
            $(".hasSelect2").val(null).trigger("change");
        })
        $('input.e-submit').on('keydown', function(e){
            if(e.key === 'Enter') {
                $(this).closest('form')[0].submit();
            }
        });
        $('.back-page').on('click', function(e){
            e.preventDefault();
            parent.history.back();
            return false;
        });

        var bodySearch = localStorage.getItem('block-body-search');
        if(bodySearch == 'active'){
            $('div.head-search').find('div.body-search').addClass("d-block").removeClass('d-none');
            addPlaceholderSelect2Multiple();
        }
        if(bodySearch !== 'active' || ! location.pathname.includes('/search')){
            localStorage.removeItem('block-body-search');
            $('div.head-search').find('div.body-search').addClass("d-none").removeClass('d-block');
        }
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

    // preview image
    function preview() {
        previewImage.src = URL.createObjectURL(event.target.files[0]);
    }

    function addPlaceholderSelect2Multiple() {
        $("select.hasSelect2").each(function(e){
            if($(this).prop("multiple")){
               let placeholder = $(this).attr("aria-placeholder");
               $(this).select2({
                    placeholder: placeholder ?? "",
               });
            }
        });
    }

    // delete
    function deleteData(url, data, flag_del) {
        if(flag_del === "delete"){
            $.ajax({
                url: url,
                type: "DELETE",
                dataType: "JSON",
                data: data ,
                success: function (response) {
                    let level = Object.keys(response)[1];
                    let message = response[level];
                    $('#al-danger-alert').modal('hide');
                    $('#notification').html(`
                    <div class="alert alert-${level} alert-dismissible bg-${level} text-white border-0 fade show" role="alert">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>${message}</strong>
                    </div>
                    `)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                }
            });
        }
    }
</script>
</body>
</html>
