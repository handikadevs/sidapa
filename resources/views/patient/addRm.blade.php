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
                <h5 class="modal-title" id="exampleModalCenterTitle">Daftarkan No. RM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach ($patient as $item)
                    
                <!-- Create Poly Form -->
                <form method="POST" action="{{ route('patientaddRm', $item->id) }}">
                    @csrf
                    @method('PUT')
                    
                   <!-- No RM -->
                   <div class="form-group">
                    <label for="no_medical_records">Nomor Rekam Medis</label>
                    <input id="no_medical_records" type="text" class="form-control @error('no_medical_records') is-invalid @enderror" name="no_medical_records" value="{{ old('no_medical_records') }}" required autocomplete="no_medical_records" autofocus>
                    
                    @error('no_medical_records')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- End No RM -->
                    
                    <!-- End Create Poly Form -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            @endforeach 
        </div>
    </div>
</div>
<!-- End Vertically Centered Modals -->