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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Buat Keluhan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Create Account Form -->
                <form method="POST" action="{{ route('complaints.store') }}">
                    @csrf

                    {{-- Hidden Input --}}
                    <input type="hidden" name="patient_id" value="{{ Auth::user()->id }}">
                    <!-- Complaint -->
                    <div class="form-group">
                        <label for="complaint">Keluhan</label>
                        <textarea id="complaint" type="text" class="form-control @error('complaint') is-invalid @enderror" name="complaint" value="{{ old('complaint') }}" required autocomplete="complaint" autofocus placeholder="Tuliskan keluhan anda sesuai yang dirasakan"></textarea>
                        
                        @error('complaint')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- End Complaint -->
                    <!-- End Create Account Form -->
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