@extends('layouts.app')

@section('bodyClass')layout-default @endsection
@section('customCss')
    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="assets/css/vendor-fontawesome-free.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-fontawesome-free.rtl.css" rel="stylesheet">
    <!-- Flatpickr -->
    <link type="text/css" href="assets/css/vendor-flatpickr.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-flatpickr.rtl.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-flatpickr-airbnb.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-flatpickr-airbnb.rtl.css" rel="stylesheet">

    <!-- Vector Maps -->
    <link type="text/css" href="assets/vendor/jqvmap/jqvmap.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="preloader"></div>

<!-- Header Layout -->
<div class="mdk-header-layout js-mdk-header-layout">
    <x-navigation/>
    <div class="mdk-header-layout__content">
        <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
            <div class="mdk-drawer-layout__content page">
                <x-page-header/>
                <div class="container-fluid page__container">

                </div>
            </div>
            <x-sidebar/>
        </div>
    </div>
</div>

@endsection
