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
        <h1 class="h2 mb-2">Detail Poli</h1>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::previous() }}">Kembali</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Poli</li>
            </ol>
        </nav>
        <!-- End Breadcrumb -->

        <div class="row">
            <div class="col-md-12 col-lg-12">
                @foreach ($data as $item)
                <!-- Card -->
                <div class="card mb-2">
                    <!-- Card Header -->
                    <header class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="card-header-title">{{ $item->name }}</h3>

                            <!-- Card Icons -->
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item dropdown">
                                    <a id="createNewProjectMenuInvoker" class="u-icon-sm link-muted" href="#" role="button" aria-haspopup="true" aria-expanded="false"
                                       data-toggle="dropdown"
                                       data-offset="8">
                                        <span class="ti-more"></span>
                                    </a>

                                    <!-- Card Menu -->
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="createNewProjectMenuInvoker" style="width: 150px;">
                                        <div class="card border-0 p-3">
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-3">
                                                    <a class="d-block link-dark" href="#">Edit</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Card Menu -->
                                </li>
                            </ul>
                            <!-- End Card Icons -->
                        </div>
                    </header>
                    <!-- End Card Header -->
                    <!-- Card Body -->
                    <div class="card-body pt-2">
                        <h3 class="mb-1">Pelayanan : {{ $item->services }}</h3>
                        <h5 class="text-muted mb-2">Hari Pelayanan : {{ $item->service_days }}</h5>
                        <h5 class="text-muted mb-2">Jam Pelayanan : {{ date('H:i', strtotime($item->hours_from)) }} - {{ date('H:i', strtotime($item->hours_to)) }}</h5>
                        <h5 class="text-muted mb-2">Dokter : {{ $item->doctor }}</h5>
                        <h5 class="text-muted mb-0">Kategori poli : {{ $item->categories }}</h5>
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
@endsection