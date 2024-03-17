<style>
    textarea {
        min-height: 300px;
        padding: 10px;
        font-size: 16px;
        line-height: 1.5;
        resize: none;
    }
</style>

<!-- Vertically Centered Modals -->
<div class="modal fade" id="createNewPoly" tabindex="-1" role="dialog" aria-labelledby="createNewPolyTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createNewPolyTitle">Buat Poli Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Create Poly Form -->
                <form method="POST" action="{{ route('polies.store') }}">
                    @csrf

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Nama Poli</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- End Name -->

                     <!-- Category -->
                     <div class="form-group">
                        <label for="category">Kategori</label>
                        <select id="category" type="text" class="form-control @error('categories') is-invalid @enderror" name="categories" value="{{ old('categories') }}" required autocomplete="categories" autofocus>
                            <option>Pilih Kategori</option>
                            <option value="umum">Pelayanan Pengobatan Umum</option>
                            <option value="kia_kb_mtbs">Pelayanan KIA, KB dan MTBS</option>
                            <option value="lab">Pelayanan Laboratorium</option>
                            <option value="gigi">Pelayanan Kesehatan Gigi dan Mulut</option>
                            <option value="ugd">Pelayanan Unit Gawat Darurat</option>
                            <option value="persalinan">Pelayanan Persalinan</option>
                            <option value="obat">Pelayanan Obat</option>
                            <option value="imunisasi">Pelayanan Imunisasi</option>
                            <option value="klinik">Pelayanan Klinik Terpadu</option>
                        </select>
                        
                        @error('categories')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- End Category -->

                    <!-- Services -->
                    <div class="form-group">
                        <label for="services">Pelayanan</label>
                        <textarea id="services" type="text" class="form-control @error('services') is-invalid @enderror" name="services" value="{{ old('services') }}" required autocomplete="services" autofocus placeholder="Masukkan Pelayanan yang disediakan"></textarea>
                        
                        @error('services')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- End Services -->

                    <!-- Service Hours -->
                    <div class="form-group">
                        <label for="days">Hari Pelayanan</label>
                        <input id="days" type="text" class="form-control @error('service_days') is-invalid @enderror" name="service_days" value="{{ old('service_days') }}" required autocomplete="service_days" autofocus placeholder="Setiap Hari Senin - Sabtu">
                        
                        @error('service_days')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- End Service Hours -->

                    <!-- Service Hours -->
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="hours_from">Pelayanan Dari Pukul</label>
                            <input id="hours_from" type="time" class="form-control @error('hours_from') is-invalid @enderror" name="hours_from" value="{{ old('hours_from') }}" required autocomplete="hours_from" autofocus>
                            
                            @error('hours_from')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="hours_to">Hingga Pukul</label>
                            <input id="hours_to" type="time" class="form-control @error('hours_to') is-invalid @enderror" name="hours_to" value="{{ old('hours_to') }}" required autocomplete="hours_to" autofocus>
                            
                            @error('hours_to')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                    </div>
                    <!-- End Service Hours -->

                    <!-- Doctor -->
                    <div class="form-group">
                        <label for="doctor">Dokter</label>
                        <input id="doctor" type="text" class="form-control @error('doctor') is-invalid @enderror" name="doctor" value="{{ old('doctor') }}" required autocomplete="doctor" autofocus>
                        
                        @error('doctor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- End Service Hours -->

                    <!-- End Create Poly Form -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Vertically Centered Modals -->