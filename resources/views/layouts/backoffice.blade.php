<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('favicon/logo-icon.png')}}" type="image/x-icon">
    <title>@yield('title') Admin Panel Budayaku</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    @stack('css')
</head>

<body class="light">
@include('backoffice.partials.loader')
<div id="app">
    @include('backoffice.partials.sidebar')
    <div class="page has-sidebar-left">
        @include('backoffice.partials.navbar')
        @yield('content')
    </div>
</div>
<!--/#app -->
<script src="{{ asset('backend/js/app.js') }}"></script>
<script src="{{ asset('backend/js/sweetalert.min.js') }}"></script>
@stack('js')
</body>

</html>
