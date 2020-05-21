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
        <link type="text/css" href="assets/vendor/simplebar.min.css" rel="stylesheet">

        <!-- App CSS -->
        <link type="text/css" href="assets/css/app.css" rel="stylesheet">
        <link type="text/css" href="assets/css/app.rtl.css" rel="stylesheet">

        <!-- Material Design Icons -->
        <link type="text/css" href="assets/css/vendor-material-icons.css" rel="stylesheet">
        <link type="text/css" href="assets/css/vendor-material-icons.rtl.css" rel="stylesheet">

        <!-- Font Awesome FREE Icons -->
        <link type="text/css" href="assets/css/vendor-fontawesome-free.css" rel="stylesheet">
        <link type="text/css" href="assets/css/vendor-fontawesome-free.rtl.css" rel="stylesheet">
        @yield('customCss')
    </head>

    <body class="@yield('bodyClass')">
        @yield('content')
        <!-- jQuery -->
        <script src="assets/vendor/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="assets/vendor/popper.min.js"></script>
        <script src="assets/vendor/bootstrap.min.js"></script>

        <!-- Simplebar -->
        <script src="assets/vendor/simplebar.min.js"></script>

        <!-- DOM Factory -->
        <script src="assets/vendor/dom-factory.js"></script>

        <!-- MDK -->
        <script src="assets/vendor/material-design-kit.js"></script>

        <!-- App -->
        <script src="assets/js/toggle-check-all.js"></script>
        <script src="assets/js/check-selected-row.js"></script>
        <script src="assets/js/dropdown.js"></script>
        <script src="assets/js/sidebar-mini.js"></script>
        <script src="assets/js/app.js"></script>
        @yield('customScript')

    </body>
</html>