@extends('layouts.mainLayouts.app')

@section('content')
<style>
    a.disabled {
  pointer-events: none;
  cursor: default;
}
</style>
<div class="u-content">
    <!-- Content Body -->
    <div class="u-body">
        <h1 class="h2 mb-2">Detail Keluhan</h1>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::previous() }}">Kembali</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail keluhan</li>
            </ol>
        </nav>
        <!-- End Breadcrumb -->

        <div class="row">
            <div class="col-md-12 col-lg-12">
                @foreach ($complaint as $item)
                <!-- Card -->
                <div class="card mb-2">
                    <!-- Card Header -->
                    <header class="card-header">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-sm-12">
                                <h3 class="card-header-title">Nama Pasien : {{ $item->user->name }}</h3>
                            </div>
                            <div class="col-sm-12 row align-items-center justify-content-between">
                                <!-- Card Icons -->
                                @if (Auth::user()->hasRole(['admin', 'staff']))
                                    @if ($item->user->no_medical_records === null)
                                        <div class="col-sm-6 d-flex">
                                            <h4 class="card-header-title text-muted mr-4">No. RM : Belum Terdaftar</h4>
                                            <a class="btn btn-sm btn-primary" href={{ route('patientdetailPatient', $item->patient_id ) }}>Edit No RM</a>
                                        </div>
                                    @else
                                        <div class="col-sm-6 d-flex">
                                            <h4 class="card-header-title text-muted">No. RM : {{ $item->user->no_medical_records }}</h4>
                                        </div>
                                    @endif
                                    @if ($item->poly_id === null)
                                        <div class="col-sm-6 d-flex">
                                            <h4 class="card-header-title text-muted mr-4">Poli : Belum Terdaftar</h4>
                                            <a class="btn btn-sm btn-primary" href="#exampleModalCenter" data-toggle="modal">Edit Poli</a>
                                        </div>
                                    @else
                                        <div class="col-sm-6 d-flex">
                                            <h4 class="card-header-title text-muted">Poli : {{ $item->poly->name }}</h4>
                                        </div>
                                    @endif
                                @else
                                    <h4 class="card-header-title text-muted">No. RM : {{ $item->user->no_medical_records ?? "Tidak ada data" }}</h4>
                                    <h4 class="card-header-title text-muted">Poli : {{ $item->poly->name ?? "Tidak ada data" }}</h4>
                                @endif
                                    <!-- End Card Icons -->
                            </div>
                        </div>
                    </header>
                    <!-- End Card Header -->
                    <!-- Card Body -->
                    <div class="card-body pt-2">
                        <h3 class="mb-1">Keluhan : {{ $item->complaint }}</h3>
                        <p class="h4 text-muted mb-2">Dibuat pada : {{ date('d M Y H:i:s', strtotime($item->created_at)) }}</p>
                    </div>
                    <!-- End Card Body -->
                </div>
                <!-- End Card -->
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Content Body -->
    @include('layouts.footer')
</div>
@include('complaint.addPoly')
@endsection