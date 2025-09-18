<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-3 shadow-lg">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title fw-semibold" id="modalTambahLabel">Tambah Dompet</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form action="{{ route('master-dompet.store') }}" method="POST">
        @csrf
        <div class="modal-body p-4">
            <div class="mb-3">
                <label class="form-label">Nama Dompet</label>
                <input type="text" name="nama_dompet" value="{{ old('nama_dompet') }}" class="form-control">
                @error('nama_dompet') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
