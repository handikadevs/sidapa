@extends('layouts.mainLayouts.app')

@section('content')
<div class="u-content">
    <!-- Content Body -->
    <div class="u-body">
        <h1 class="h2 mb-2">Data Pasien</h1>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Pasien</li>
            </ol>
        </nav>
        <!-- End Breadcrumb -->

        <!-- Card -->
        <div class="card mb-5">

            <!-- Crad Body -->
            <div class="card-body pt-0">
                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                        <tr>
                            <th>NIK</th>
                            <th>No. RM</th>
                            <th>No. BPJS</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th style="width: 200px;">Keluhan</th>
                            {{-- <th class="text-center">Aksi</th> --}}
                        </tr>
                        </thead>
                        <tbody>
                            @if ($data->count() > 0)
                            @foreach ($data as $patient)
                                <tr>
                                    <td class="font-weight-semi-bold">{{ $patient->nik }}</td>
                                    <td class="font-weight-semi-bold">{{ $patient->no_medical_records ?? "Tidak ada data" }}</td>
                                    <td class="font-weight-semi-bold">{{ $patient->no_bpjs ?? "Tidak ada data" }}</td>
                                    <td class="font-weight-semi-bold">{{ $patient->name }}</td>
                                    <td class="font-weight-semi-bold">{{ date('d M Y', strtotime($patient->birth_date)) }}</td>
                                    <td class="font-weight-semi-bold">
                                        @foreach ($patient->complaint as $item)
                                        {{
                                            $item->complaint ?? "Tidak ada data"
                                        }} <br>
                                    @endforeach
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
                                            <div class="dropdown-menu dropdown-menu-right" style="width: 150px;">
                                                <div class="card border-0 p-3">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="mb-3">
                                                            <a class="btn btn-sm btn-outline-primary" href="{{ route('patientdetailPatient', $patient->id) }}">Detail</a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('users.destroy', $patient->id) }}"
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
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="font-weight-semi-bold text-center text-muted">Tidak ada data</td>
                                <td></td>
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
@endsection