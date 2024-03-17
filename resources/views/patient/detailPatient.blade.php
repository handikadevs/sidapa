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
        <h1 class="h2 mb-2">Detail Pasien</h1>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::previous() }}">Kembali</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Pasien</li>
            </ol>
        </nav>
        <!-- End Breadcrumb -->

        <div class="row">
            <div class="col-md-5 col-lg-4">
                @foreach ($patient as $item)
                <!-- Card -->
                <div class="card mb-2">
                    <!-- Card Body -->
                    <div class="card-body pt-4">
                        <h3 class="mb-1">{{ $item->name }}</h3>
                        <h5 class="text-muted mb-2">{{ $item->nik }}</h5>
                        <h5 class="text-muted mb-2">{{ date('d M Y', strtotime($item->birth_date)) }}</h5>
                        @if ($item->gender === 'male')
                            <h5 class="text-muted mb-0">Laki laki</h5>
                        @else
                            <h5 class="text-muted mb-0">Perempuan</h5>
                        @endif
                    </div>
                    <!-- End Card Body -->
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="card mb-2">
                    <!-- Card Header -->
                    <header class="card-header">
                        <h2 class="h4 card-header-title">Kontak Pasien</h2>
                    </header>
                    <!-- End Card Header -->

                    <!-- Card Body -->
                    <div class="card-body py-0">
                        <!-- Flushed List Group -->
                        <ul class="list-group list-group-flush">
                            <!-- List Group Item -->
                            <li class="list-group-item border-0">
                                <a class="disabled media link-dark align-items-center" href="#">
                                    <!-- Title and Short Text -->
                                    <div class="media-body">
                                        <div class="text-muted">Alamat Email</div>
                                        <h4 class="font-weight-normal pt-1">{{ $item->email }}</h4>
                                    </div>
                                    <!-- End Title and Short Text -->
                                </a>
                            </li>
                            <!-- End List Group Item -->

                            <!-- List Group Item -->
                            <li class="list-group-item border-0">
                                @if (Auth::user()->hasRole(['admin', 'staff']))
                                    <a class="media link-dark align-items-center" target="_blank" href="https://wa.me/{{ $item->phone_number }}?text=Halo%20Bapak/Ibu%20{{ $item->name }}">
                                @else
                                    <a class="disabled media link-dark align-items-center" target="_blank" href="#">
                                @endif
                                    <!-- Title and Short Text -->
                                    <div class="media-body">
                                        <div class="text-muted">No. Telepon</div>
                                        <h4 class="font-weight-normal pt-1">{{ $item->phone_number }}</h4>
                                    </div>
                                    <!-- End Title and Short Text -->
                                </a>
                            </li>
                            <!-- End List Group Item -->

                            <!-- List Group Item -->
                            <li class="list-group-item border-0">
                                <a class="disabled media link-dark align-items-center" href="#">
                                    <!-- Title and Short Text -->
                                    <div class="media-body">
                                        <div class="text-muted">Alamat</div>
                                        <h4 class="font-weight-normal pt-1 mb-4">{{ $item->address }}</h4>
                                    </div>
                                    <!-- End Title and Short Text -->
                                </a>
                            </li>
                            <!-- End List Group Item -->
                        </ul>
                        <!-- End Flushed List Group -->
                    </div>
                    <!-- End Card Body -->
                </div>
                <!-- End Card -->
                @endforeach
            </div>

            <div class="col-md-7 col-lg-8">
                <!-- Card -->
                <div class="card mb-2">
                    <!-- Card Header -->
                    <header class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2 class="h4 card-header-title">Dokumen Medis</h2>
                            @if (Auth::user()->hasRole(['admin', 'staff']))
                                <a class="btn btn-sm btn-primary" href="#exampleModalCenter" data-toggle="modal">Daftarkan No. RM</a>
                            @endif
                        </div>
                    </header>
                    <!-- End Card Header -->

                    <!-- Card Body -->
                    <div class="card-body py-0">
                        <!-- Simple List Group -->
                        <ul class="list-group">
                            <!-- List Group Item -->
                            <li class="list-group-item px-3">
                                <div class="media align-items-center">
                                    <!-- Title -->
                                    <div class="media-body">
                                        <h4 class="font-weight-normal mb-0 text-dark">BPJS</h4>
                                    </div>
                                    <!-- End Title -->

                                    <!-- Date -->
                                    <span class="ml-auto">
                                        {{ $item->no_bpjs ?? "Tidak ada data"}}
                                    </span>
                                    <!-- End Date -->
                                </div>
                            </li>
                            <!-- End List Group Item -->
                            <!-- List Group Item -->
                            <li class="list-group-item px-3">
                                <div class="media align-items-center">
                                    <!-- Title -->
                                    <div class="media-body">
                                        <h4 class="font-weight-normal mb-0 text-dark">No. Rekam Medis</h4>
                                    </div>
                                    <!-- End Title -->

                                    <!-- Date -->
                                    <span class="ml-auto">
                                        {{ $item->no_medical_records ?? "Tidak ada data"}}
                                    </span>
                                    <!-- End Date -->
                                </div>
                            </li>
                            <!-- End List Group Item -->
                        </ul>
                        <!-- End Simple List Group -->
                    </div>
                    <!-- End Card Body -->

                    <!-- Card Footer -->
                    <footer class="card-footer d-flex align-items-center justify-content-between">
                    </footer>
                    <!-- End Card Footer -->
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="card mb-2">
                    <!-- Card Header -->
                    <header class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2 class="h4 card-header-title">
                               Riwayat Keluhan Pasien
                            </h2>
                        </div>
                    </header>
                    <!-- End Card Header -->

                    <!-- Card Body -->
                    <div class="card-body py-0">
                        <!-- Simple List Group -->
                        <ul class="list-group">
                            <!-- List Group Item -->
                            <li class="list-group-item px-3">
                                <div class="media align-items-center">
                                    @foreach ($complaints as $item)
                                        
                                    <!-- Title -->
                                    <div class="media-body">
                                        <div class="text-muted mb-1">{{ $item->created_at }}</div>
                                        <h4 class="font-weight-semi-bold mb-1">{{ $item->complaint ?? "- - -" }}</h4>
                                    </div>
                                    <!-- End Title -->
                                    
                                    @if ($item->poly !== null)
                                        <!-- State -->
                                        <span class="badge badge-md badge-pill badge-primary-soft ml-auto">Poli Tujuan : {{ $item->poly->name }}</span>
                                        <!-- End State -->
                                    @else
                                        <a class="align-items-center" href="{{ route('complaints.show', $item->id) }}">Daftarkan Poli</a>
                                    @endif
                                    @endforeach
                                </div>
                            </li>
                            <!-- End List Group Item -->
                        </ul>
                        <!-- End Simple List Group -->
                    </div>
                    <!-- End Card Body -->

                    <!-- Card Footer -->
                    <footer class="card-footer d-flex align-items-center justify-content-between">
                    </footer>
                    <!-- End Card Footer -->
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>
    <!-- End Content Body -->
    @include('layouts.footer')
</div>
@include('patient.addRm')
@endsection