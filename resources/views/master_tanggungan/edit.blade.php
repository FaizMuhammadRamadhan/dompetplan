<div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-labelledby="modalEditLabel{{ $item->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-3 shadow-lg">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title fw-semibold" id="modalEditLabel{{ $item->id }}">Edit Tanggungan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form action="{{ route('master-tanggungan.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body p-4">
            <div class="mb-3">
                <label class="form-label">Nama Tanggungan</label>
                <input type="text" name="nama_tanggungan" value="{{ old('nama_tanggungan', $item->nama_tanggungan) }}" class="form-control">
                @error('nama_tanggungan') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tagihan Perbulan (Rp)</label>
                <input type="number" name="tagihan_perbulan" value="{{ old('tagihan_perbulan', $item->tagihan_perbulan) }}" class="form-control" min="0">
                @error('tagihan_perbulan') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Lama Cicilan</label>
                <input type="number" name="lama_cicilan" value="{{ old('lama_cicilan', $item->lama_cicilan) }}" class="form-control" min="0">
                @error('lama_cicilan') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai', $item->tanggal_mulai) }}" class="form-control">
                @error('tanggal_mulai') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Jatuh Tempo Perbulan</label>
                <input type="number" name="tanggal_jatuh_tempo_perbulan" value="{{ old('tanggal_jatuh_tempo_perbulan', $item->tanggal_jatuh_tempo_perbulan) }}" class="form-control">
                @error('tanggal_jatuh_tempo_perbulan') <small class="text-danger">{{ $message }}</small> @enderror
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
