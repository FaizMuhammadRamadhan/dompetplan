@extends('layouts.app')


@section('title', 'Master Target')

@section('content')
<div class="container-fluid px-0">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <button class="btn btn-primary shadow-sm bi bi-plus-square" data-bs-toggle="modal" data-bs-target="#modalTambah">
            Tambah Target
        </button>
    </div>

    {{-- Table --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <table class="table table-hover table-striped align-middle mb-0 text-center">
                <thead class="table-light text-muted">
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th>Nama Target</th>
                        <th>Nominal Target</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Berakhir</th>
                        <th style="width: 180px;">Aksi</th> 
                    </tr>
                </thead>
                <tbody>
                    @forelse($target as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="fw-semibold capitalize">{{ $item->nama_target }}</td>
                            <td class="fw-semibold">{{ $item->nominal_target }}</td>
                            <td class="fw-semibold">{{ $item->tanggal_mulai }}</td>
                            <td class="fw-semibold">{{ $item->tanggal_berakhir }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning text-white me-1 bi bi-pencil-square" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $item->id }}">
                                    Edit
                                </button>
                                <form action="{{ route('master-target.destroy', $item->id) }}" method="POST" class="d-inline" id="formHapus{{ $item->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger bi bi-trash-fill"
                                        onclick="konfirmasiHapus({{ $item->id }})">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>

                        @include('master_target.edit', ['item' => $item])
                    @empty
                        <tr>
                            <td colspan="6" class="py-4 text-muted">Belum ada target</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('master_target.create')

@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: @json(session('success')),
                timer: 2000,
                showConfirmButton: false
            });
        @endif
    });

    function konfirmasiHapus(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data tidak bisa dikembalikan setelah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formHapus' + id).submit();
            }
        });
    }
</script>
@endpush
