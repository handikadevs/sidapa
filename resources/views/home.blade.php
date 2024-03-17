@extends('layouts.mainLayouts.app')

@section('content')
<div class="u-content">
    <!-- Content Body -->
    <div class="u-body">
        @if (Auth::user()->hasRole(['admin', 'staff']))
            <!-- Doughnut Chart -->
            <div class="row">
                <div class="col-sm-6 col-xl-3 mb-5">
                    <!-- Card -->
                    <div class="card">
                        <!-- Card Body -->
                        <div class="card-body">
                            <!-- Chart with Info -->
                            <div class="media align-items-center py-2">
                                <!-- Chart with Info - Info -->
                                <div class="media-body">
                                    <h5 class="h5 text-muted mb-2">Total Pasien Baru</h5>
                                    <span class="h2 font-weight-normal mb-0">{{ Auth::user()->where('category', 'new')->count() }}</span>
                                </div>
                                <!-- End Chart with Info - Info -->
                            </div>
                            <!-- End Chart with Info -->
                        </div>
                        <!-- End Card Body -->
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-sm-6 col-xl-3 mb-5">
                    <!-- Card -->
                    <div class="card">
                        <!-- Card Body -->
                        <div class="card-body">
                            <!-- Chart with Info -->
                            <div class="media align-items-center py-2">
                                <!-- Chart with Info - Info -->
                                <div class="media-body">
                                    <h5 class="h5 text-muted mb-2">Total Pasien Lama</h5>
                                    <span class="h2 font-weight-normal mb-0">{{ Auth::user()->where('category', 'old')->count() }}</span>
                                </div>
                                <!-- End Chart with Info - Info -->
                            </div>
                            <!-- End Chart with Info -->
                        </div>
                        <!-- End Card Body -->
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-sm-6 col-xl-3 mb-5">
                    <!-- Card -->
                    <div class="card">
                        <!-- Card Body -->
                        <div class="card-body">
                            <!-- Chart with Info -->
                            <div class="media align-items-center py-2">
                                <!-- Chart with Info - Info -->
                                <div class="media-body">
                                    <h5 class="h5 text-muted mb-2">Total Staff RM</h5>
                                    <span class="h2 font-weight-normal mb-0">{{ Auth::user()->where('category', 'rm')->count() }}</span>
                                </div>
                                <!-- End Chart with Info - Info -->
                            </div>
                            <!-- End Chart with Info -->
                        </div>
                        <!-- End Card Body -->
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-sm-6 col-xl-3 mb-5">
                    <!-- Card -->
                    <div class="card">
                        <!-- Card Body -->
                        <div class="card-body">
                            <!-- Chart with Info -->
                            <div class="media align-items-center py-2">
                                <!-- Chart with Info - Info -->
                                <div class="media-body">
                                    <h5 class="h5 text-muted mb-2">Total Dokter</h5>
                                    <span class="h2 font-weight-normal mb-0">{{ Auth::user()->where('category', 'doctor')->count() }}</span>
                                </div>
                                <!-- End Chart with Info - Info -->
                            </div>
                            <!-- End Chart with Info -->
                        </div>
                        <!-- End Card Body -->
                    </div>
                    <!-- End Card -->
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                  <!-- Card -->
                    <div class="card mb-5">
                        <!-- Card Header -->
                        <header class="card-header">
                            <div class="d-flex justify-content-between">
                                <h2 class="h3 mb-2">Keluhan Hari Ini</h2>
                                <a class="btn btn-sm btn-primary text-uppercase mb-2 mr-2 mr-md-4" href="{{ route('complaints.index') }}">Lihat Semua Keluhan</a>
                            </div>
                        </header>
                        <!-- End Card Header -->
                        <!-- Crad Body -->
                        <div class="card-body pt-0">
                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>No. RM</th>
                                            <th>Nama</th>
                                            <th style="width: 500px;">Keluhan</th>
                                            <th>Poli Tujuan</th>
                                            <th class="text-center">Di buat pada</th>
                                            {{-- <th class="text-center">Aksi</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($data->count() > 0)
                                            @foreach ($data as $complaint)
                                                <tr>
                                                    <td class="font-weight-semi-bold">{{ $complaint->user->no_medical_records ?? "Tidak ada data" }}</td>
                                                    <td class="font-weight-semi-bold">{{ $complaint->user->name ?? "Tidak ada data" }}</td>
                                                    <td class="font-weight-semi-bold">{{ $complaint->complaint }}</td>
                                                    <td class="font-weight-semi-bold">{{ $complaint->poly->name ?? "Tidak ada data" }}</td>
                                                    <td class="font-weight-semi-bold text-center">{{ date('d M Y H:i:s', strtotime($complaint->created_at)) }}</td>
                                                    @if (Auth::user()->hasRole(['admin', 'staff']))
                                                        <td class="text-center">
                                                            <!-- Actions -->
                                                            <div class="dropdown">
                                                                <!-- Actions Invoker -->
                                                                <a id="basicTable1MenuInvoker" class="u-icon-sm link-muted" href="#" role="button" aria-haspopup="true" aria-expanded="false"
                                                                    data-toggle="dropdown"
                                                                    data-offset="8">
                                                                    <span class="ti-more"></span>
                                                                </a>
                                                                <!-- End Actions Invoker -->

                                                                <!-- Actions Menu -->
                                                                <div class="dropdown-menu dropdown-menu" style="width: 150px;">
                                                                    <div class="card border-0 p-3">
                                                                        <ul class="list-unstyled mb-0">
                                                                            <li class="mb-3">
                                                                                <a class="btn btn-sm btn-outline-primary" href="{{ route('complaints.show', $complaint->id) }}">Detail</a>
                                                                            </li>
                                                                            <li>
                                                                                <form action="{{ route('complaints.destroy', $complaint->id) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                                                </form>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <!-- End Actions Menu -->
                                                            </div>
                                                            <!-- End Actions -->
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td class="font-weight-semi-bold text-center text-muted">Tidak ada data</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Table -->
                        </div>
                        <!-- Crad Body -->
                    </div>
                    <!-- End Card -->
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-sm-12">
                <!-- Card -->
                    <div class="card mb-5">
                        <!-- Card Header -->
                        <header class="card-header">
                            <div class="d-flex justify-content-between">
                                <h2 class="h3 mb-2">Keluhan Hari Ini</h2>
                                <a class="btn btn-sm btn-primary text-uppercase mb-2 mr-2 mr-md-4" href="{{ route('complaints.index') }}">Lihat Semua Keluhan</a>
                            </div>
                        </header>
                        <!-- End Card Header -->
                        <!-- Crad Body -->
                        <div class="card-body pt-0">
                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>No. RM</th>
                                            <th>Nama</th>
                                            <th style="width: 500px;">Keluhan</th>
                                            <th>Poli Tujuan</th>
                                            <th class="text-center">Di buat pada</th>
                                            {{-- <th class="text-center">Aksi</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($data->count() > 0)
                                            @foreach ($data as $complaint)
                                                <tr>
                                                    <td class="font-weight-semi-bold">{{ $complaint->user->no_medical_records ?? "Tidak ada data" }}</td>
                                                    <td class="font-weight-semi-bold">{{ $complaint->user->name ?? "Tidak ada data" }}</td>
                                                    <td class="font-weight-semi-bold">{{ $complaint->complaint }}</td>
                                                    <td class="font-weight-semi-bold">{{ $complaint->poly->name ?? "Tidak ada data" }}</td>
                                                    <td class="font-weight-semi-bold text-center">{{ date('d M Y H:i:s', strtotime($complaint->created_at)) }}</td>
                                                    @if (Auth::user()->hasRole(['admin', 'staff']))
                                                        <td class="text-center">
                                                            <!-- Actions -->
                                                            <div class="dropdown">
                                                                <!-- Actions Invoker -->
                                                                <a id="basicTable1MenuInvoker" class="u-icon-sm link-muted" href="#" role="button" aria-haspopup="true" aria-expanded="false"
                                                                    data-toggle="dropdown"
                                                                    data-offset="8">
                                                                    <span class="ti-more"></span>
                                                                </a>
                                                                <!-- End Actions Invoker -->

                                                                <!-- Actions Menu -->
                                                                <div class="dropdown-menu dropdown-menu" style="width: 150px;">
                                                                    <div class="card border-0 p-3">
                                                                        <ul class="list-unstyled mb-0">
                                                                            <li class="mb-3">
                                                                                <a class="btn btn-sm btn-outline-primary" href="{{ route('complaints.show', $complaint->id) }}">Detail</a>
                                                                            </li>
                                                                            <li>
                                                                                <form action="{{ route('complaints.destroy', $complaint->id) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                                                </form>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <!-- End Actions Menu -->
                                                            </div>
                                                            <!-- End Actions -->
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td class="font-weight-semi-bold text-center text-muted">Tidak ada data</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Table -->
                        </div>
                        <!-- Crad Body -->
                    </div>
                    <!-- End Card -->
                </div>
            </div>
        @endif
    </div>
    <!-- End Content Body -->
    @include('layouts.footer')
</div>
@endsection
