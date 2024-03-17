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
                <h5 class="modal-title" id="exampleModalCenterTitle">Daftarkan Poli</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach ($complaint as $item)           
                    <!-- Create Poly Form -->
                    <form method="POST" action="{{ route('complaints.update', $item->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <!-- Add Poly -->
                        <div class="form-group">
                            <label for="poly_id">Poli</label>
                            <select id="poly_id" type="text" class="form-control @error('poly_id') is-invalid @enderror" name="poly_id" value="{{ old('poly_id') }}" required autocomplete="poly_id" autofocus>
                                @foreach ($polies as $poly)
                                    <option value={{ $poly->id }}>{{ $poly->name }}</option>
                                @endforeach
                            </select>
                            
                            @error('poly_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- End Add Poly -->

                        <input type="hidden" name="id" value={{ $item->id }}>
                        <input type="hidden" name="patient_id" value={{ $item->patient_id }}>
                        <textarea name="complaint" hidden>{{ $item->complaint }}</textarea>
                        <input type="hidden" name="created_at" value={{ $item->created_at }}>
                        
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