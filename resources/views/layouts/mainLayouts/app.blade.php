<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
     <!-- Meta -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta http-equiv="x-ua-compatible" content="ie=edge">
 
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
  
     <title>{{ config('app.name', 'Si Dapa') }}</title>
 
     <!-- Favicon -->
     <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
 
     <!-- Web Fonts -->
     <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
 
     <!-- Components Vendor Styles -->
     <link rel="stylesheet" href="{{ asset('assets') }}/vendor/themify-icons/themify-icons.css">
	   <link rel="stylesheet" href="{{ asset('assets')}}/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
 
     <!-- Theme Styles -->
     <link rel="stylesheet" href="{{ asset('assets') }}/css/theme.css">
 
     <!-- Scripts -->
     {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>
    @include('layouts.header')
    @include('sweetalert::alert')
    <!-- Main -->
		<main class="u-main">
        @include('layouts.sidebar')
        @yield('content')
    </main>
		<!-- End Main -->

    <!-- Global Vendor -->
		<script src="{{ asset('assets')}}/vendor/jquery/dist/jquery.min.js"></script>
		<script src="{{ asset('assets')}}/vendor/jquery-migrate/jquery-migrate.min.js"></script>
		<script src="{{ asset('assets')}}/vendor/popper.js/dist/umd/popper.min.js"></script>
		<script src="{{ asset('assets')}}/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

		<!-- Plugins -->
		<script src="{{ asset('assets')}}/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
		<script src="{{ asset('assets')}}/vendor/chart.js/dist/Chart.min.js"></script>
		<script src="{{ asset('assets')}}/vendor/chartjs-plugin-style/dist/chartjs-plugin-style.min.js"></script>

		<!-- Initialization  -->
		<script src="{{ asset('assets')}}/js/sidebar-nav.js"></script>
		<script src="{{ asset('assets')}}/js/main.js"></script>

		<script src="{{ asset('assets')}}/js/charts/area-chart.js"></script>
		<script src="{{ asset('assets')}}/js/charts/area-chart-small.js"></script>
		<script src="{{ asset('assets')}}/js/charts/doughnut-chart.js"></script>
</body>
</html>
