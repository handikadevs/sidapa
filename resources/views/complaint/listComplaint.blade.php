@extends('layouts.mainLayouts.app')

@section('content')
<!-- Content -->
<div class="u-content">
    <!-- Content Body -->
    <div class="u-body">
        <h1 class="h2 mb-2">Data Keluhan</h1>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Keluhan</li>
            </ol>
        </nav>
        <!-- End Breadcrumb -->

        <!-- Card -->
        <div class="card mb-5">
            <!-- Card Header -->
            <header class="card-header">
                <a class="btn btn-sm btn-primary text-uppercase mb-2 mr-2 mr-md-4" href="#exampleModalCenter" data-toggle="modal">Keluhan Baru</a>
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
    <!-- End Content Body -->
    @include('layouts.footer')
</div>
<!-- End Content -->
@include('complaint.createComplaint')
@endsection