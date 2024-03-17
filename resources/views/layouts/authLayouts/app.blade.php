<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <title>{{ config('app.name', 'Si Poni Putih') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

    <!-- Web Fonts -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Components Vendor Styles -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/themify-icons/themify-icons.css">

    <!-- Theme Styles -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/theme.css">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body class="antialiased">
    <main class="d-flex flex-column u-hero u-hero--end mnh-100vh" style="background-image: linear-gradient(rgba(255, 255, 255, 0.7),
    rgba(255, 255, 255, 0.7)), url({{asset('assets')}}/img/bg_puskesmas.jpg); box-shadow: inset 0 0 120px #fff, inset 0 0 80px #fff, inset 0 0 40px #fff;">
    @include('sweetalert::alert')
            @yield('content')

        <!-- Footer -->
			<footer class="u-footer mt-auto">
				<div class="container">
					<div class="d-md-flex align-items-md-center text-center text-md-left text-muted">
						<!-- Footer Menu -->
						<ul class="list-inline mb-3 mb-md-0">
							<li class="list-inline-item mr-4">
								<a class="text-muted" href="#" target="_blank">Informasi Pelayanan</a>
							</li>
							<li class="list-inline-item">
								<a class="text-muted" href="#" target="_blank">Lokasi Kami</a>
							</li>
						</ul>
						<!-- End Footer Menu -->

						<!-- Copyright -->
						<span class="text-muted ml-auto">&copy; <script>document.write(new Date().getFullYear())</script> <a class="text-muted" href="https://griyakaryadigital.github.io/" target="_blank">Griya Karya Digital</a>. All Rights Reserved.</span>
						<!-- End Copyright -->
					</div>
				</div>
			</footer>
        <!-- End Footer -->
    </main>
</body>
</html>
