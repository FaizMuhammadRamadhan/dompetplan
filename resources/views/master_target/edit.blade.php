<div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-labelledby="modalEditLabel{{ $item->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-3 shadow-lg">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title fw-semibold" id="modalEditLabel{{ $item->id }}">Edit Target</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form action="{{ route('master-target.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body p-4">
            <div class="mb-3">
                <label class="form-label">Nama Target</label>
                <input type="text" name="nama_target" value="{{ old('nama_target', $item->nama_target) }}" class="form-control">
                @error('nama_target') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nominal Target</label>
                <input type="text" name="nominal_target" value="{{ old('nominal_target', $item->nominal_target) }}" class="form-control">
                @error('nominal_target') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3 flex gap-3">
                <label class="form-label">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai', $item->tanggal_mulai) }}" class="form-control">
                @error('tanggal_mulai') <small class="text-danger">{{ $message }}</small> @enderror

                <label class="form-label">Tanggal Berakhir</label>
                <input type="date" name="tanggal_berakhir" value="{{ old('tanggal_berakhir', $item->tanggal_berakhir) }}" class="form-control">
                @error('tanggal_berakhir') <small class="text-danger">{{ $message }}</small> @enderror
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
