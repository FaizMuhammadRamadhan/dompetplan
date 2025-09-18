<div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-labelledby="modalEditLabel{{ $item->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-3 shadow-lg">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title fw-semibold" id="modalEditLabel{{ $item->id }}">Edit Dompet</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form action="{{ route('master-dompet.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body p-4">
            <div class="mb-3">
                <label class="form-label">Nama Dompet</label>
                <input type="text" name="nama_dompet" value="{{ old('nama_dompet', $item->nama_dompet) }}" class="form-control">
                @error('nama_dompet') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-warning">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
