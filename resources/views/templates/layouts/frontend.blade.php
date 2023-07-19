<!doctype html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('pageTitle')</title>
    <!-- Bootstrap CSS -->
    <link rel="icon" type="image/png" href="{{ getImage(imagePath()['logoIcon']['path'] . '/favicon.png') }}"
        sizes="16x16">
    <!-- bootstrap 5  -->
    <link rel="stylesheet" href="{{ URL::to('public/assets/templates/css/lib/bootstrap.min.css') }}">
    <!-- fontawesome 5  -->
    <link rel="stylesheet" href="{{ url::to('public/assets/global/css/all.min.css') }}">
    <!-- lineawesome font -->
    <link rel="stylesheet" href="{{ url::to('public/assets/global/css/line-awesome.min.css') }}">
    <!--  -->
    <link rel="stylesheet" href="{{ url::to('public/assets/templates/css/lightcase.css') }}">
    <!-- slick slider css -->
    <link rel="stylesheet" href="{{ url::to('public/assets/templates/css/lib/slick.css') }}">
    <!-- select 2 plugin css -->
    <link rel="stylesheet" href="{{ url::to('public/assets/global/css/select2.min.css') }}">
    <!-- dateoicker css -->
    <link rel="stylesheet" href="{{ url::to('public/assets/global/css/datepicker.min.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ url::to('public/assets/templates/css/main.css') }}">
    <link rel="stylesheet" href="{{ url::to('public/assets/templates/css/bootstrap-fileinput.css') }}">
    <link rel="stylesheet" href="{{ url::to('public/assets/templates/css/custom.css') }}">
    <link rel="stylesheet" href="{{ url::to('public/assets/templates/css/color.php?color=f05945') }}">

    @stack('style-lib')

    @stack('style')
</head>

<body>

    @include('templates.partials.preloader')

    <!-- header-section start  -->
    @include('templates.partials.header')

    <div class="main-wrapper">
        {{-- @if (!request()->routeIs('home') && !request()->routeIs('property.details') && !request()->routeIs('property') && !request()->routeIs('property.category.rooms') && !request()->routeIs('property.category.rooms.date'))
            @include($activeTemplate.'partials.breadcrumb')
        @endif --}}

        @yield('content')
    </div>
    <!-- main-wrapper end -->


    <!-- footer section start -->
    @include('templates.partials.footer')

    @include('templates.partials.go_to_top')

    @stack('modal')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ url::to('public/assets/global/js/jquery-3.6.0.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ url::to('public/assets/templates/js/lib/bootstrap.bundle.min.js') }}"></script>
    <!-- slick slider js -->
    <script src="{{ url::to('public/assets/templates/js/lib/slick.min.js') }}"></script>
    <!-- scroll animation -->
    <script src="{{ url::to('public/assets/templates/js/lib/wow.min.js') }}"></script>
    <!-- lightcase js -->
    <script src="{{ url::to('public/assets/templates/js/lib/lightcase.min.js') }}"></script>
    <script src="{{ url::to('public/assets/global/js/select2.min.js') }}"></script>

    <script src="{{ url::to('public/assets/global/js/datepicker.min.js') }}"></script>
    <script src="{{ url::to('public/assets/global/js/datepicker.en.js') }}"></script>
    <!-- main js -->
    <script src="{{ url::to('public/assets/templates/js/app.js') }}"></script>

    @include('partials.notify')

    @stack('script-lib')

    @stack('script')

    <script>
       (function ($) {
            "use strict";
        })(jQuery);
    </script>

</body>

</html>
