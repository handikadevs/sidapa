@extends('layouts.authLayouts.app')

@section('content')
<div class="container py-5 my-auto">
	<div class="row align-items-center">
		<div class="col-md-12 col-lg-12 offset-lg-1 mx-auto">
			<h3 class="h1 font-weight-bold text-primary mb-5">Si Poni Putih</h3>
			<h2 class="h1">Selamat Datang<br class="d-none d-md-block"> Sistem Pendaftaran Online Puskesmas Ngletih Kota Kediri</h2>

			<!-- Benefits -->
			<ul class="list-unstyled mb-5 mt-5">
			<p class="h3 font-weight-bold text-dark">Syarat Pendaftaran :</p>
				<!-- Benefit -->
				<li class="mb-4">
					<div class="media align-items-center">
						<div class="u-icon u-icon-sm rounded-circle bg-white text-primary mr-3">
							<span class="ti-id-badge"></span>
						</div>

						<div class="media-body">
							<p class="h3 text-dark mb-0">Menyertakan identitas lengkap pasien.</p>
						</div>
					</div>
				</li>
				<!-- End Benefit -->

				<!-- Benefit -->
				<li class="mb-4">
					<div class="media align-items-center">
						<div class="u-icon u-icon-sm rounded-circle bg-white text-primary mr-3">
							<span class="ti-agenda"></span>
						</div>

						<div class="media-body">
							<p class="h3 text-dark mb-0">Nomor Rekam Medis, bagi pasien yang pernah periksa di Puskesmas Ngletih.</p>
						</div>
					</div>
				</li>
				<!-- End Benefit -->

				<!-- Benefit -->
				<li class="mb-4">
					<div class="media align-items-center">
						<div class="u-icon u-icon-sm rounded-circle bg-white text-primary mr-3">
							<span class="ti-write"></span>
						</div>

						<div class="media-body">
							<p class="h3 text-dark mb-0">Memberitahukan keluhan secara jelas dan sesuai kondisi.</p>
						</div>
					</div>
				</li>
				<!-- End Benefit -->

				<!-- Benefit -->
				<li class="mb-0">
					<div class="media align-items-center">
						<div class="u-icon u-icon-sm rounded-circle bg-white text-primary mr-3">
							<span class="ti-timer"></span>
						</div>

						<div class="media-body">
							<p class="h3 text-dark mb-0">Pendaftaran dilakukan H - 1.</p>
						</div>
					</div>
				</li>
				<!-- End Benefit -->
			</ul>
			<!-- End Benefits -->

			<div class="row gutters-sm">
				@if (Route::has('login'))
					@auth
						<div class="col-lg-6">
							<a type="button" href="{{ url('/home') }}" class="btn btn-outline-primary btn-block btn-wide text-uppercase">Kembali</a>
						</div>
					@else
						<div class="col-lg-6">
							<a type="button" href="{{ route('login') }}" class="btn btn-primary btn-block btn-wide text-uppercase">Masuk</a>
						</div>
						@if (Route::has('register'))
							<div class="col-lg-6">
								<a type="button" href="{{ route('register') }}" class="btn btn-outline-primary btn-block btn-wide text-uppercase">Daftar</a>
							</div>
						@endif
					@endauth
				@endif
			</div>
		</div>
	</div>
</div>
@endsection
