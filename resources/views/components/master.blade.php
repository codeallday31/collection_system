<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>CAM</title>

        <!-- Prevent the demo from appearing in search engines -->
        <meta name="robots" content="noindex">

        <!-- Simplebar -->
        <link type="text/css" href="{{ asset('assets/vendor/simplebar.min.css')}}" rel="stylesheet">

        <!-- App CSS -->
        <link type="text/css" href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('assets/css/app.rtl.css') }}" rel="stylesheet">

        <!-- Material Design Icons -->
        <link type="text/css" href="{{ asset('assets/css/vendor-material-icons.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('assets/css/vendor-material-icons.rtl.css') }}" rel="stylesheet">

        <!-- Font Awesome FREE Icons -->
        <link type="text/css" href="{{ asset('assets/css/vendor-fontawesome-free.css') }} " rel="stylesheet">
        <link type="text/css" href="{{ asset('assets/css/vendor-fontawesome-free.rtl.css') }}" rel="stylesheet">
        @yield('customCss')
    </head>

    <body class=" {{ $bodyClass }} ">
        {{ $slot }}
        <!-- jQuery -->
        <script src="{{ asset('assets/vendor/jquery.min.js') }}"></script>

        <!-- Bootstrap -->
        <script src="{{ asset('assets/vendor/popper.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap.min.js') }}"></script>

        <!-- Simplebar -->
        <script src="{{ asset('assets/vendor/simplebar.min.js') }}"></script>

        <!-- DOM Factory -->
        <script src="{{ asset('assets/vendor/dom-factory.js') }}"></script>

        <!-- MDK -->
        <script src="{{ asset('assets/vendor/material-design-kit.js') }}"></script>

        <!-- App -->
        <script src="{{ asset('assets/js/toggle-check-all.js')}}"></script>
        <script src="{{ asset('assets/js/check-selected-row.js')}}"></script>
        <script src="{{ asset('assets/js/dropdown.js')}}"></script>
        <script src="{{ asset('assets/js/sidebar-mini.js')}}"></script>
        <script src="{{ asset('assets/js/app.js')}}"></script>
        @yield('customScript')

    </body>
</html>