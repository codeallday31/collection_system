<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CAM</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css')}}">
        <link rel="stylesheet" href="{{ mix('css/datatable/dataTable.css') }}">
        <link rel="stylesheet" href="{{ mix('css/adminLTE/main.css')}}">
        @yield('customcss')
        
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="{{ $bodyClass }}">

        {{ $slot }}

        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
        <script src="{{ mix('js/datatable/dataTable.js') }}"></script>
        <script src="{{ mix('js/adminLTE/main.js') }}"></script>
        @yield('customscript')
    </body>
</html>
