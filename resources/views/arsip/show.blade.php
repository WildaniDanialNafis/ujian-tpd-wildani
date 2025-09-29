@extends('layouts.app')

@section('title', 'Arsip Surat')

@push('styles')
    <style>
        .pdf-preview {
            width: 100%;
            height: 600px;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .pdf-preview embed {
            width: 100%;
            height: 100%;
        }
    </style>
@endpush

@section('content')
    <div class="px-3 px-md-4">

        <div class="mb-6">
            <h1 class="h2 fw-bold text-dark d-flex align-items-center gap-2">
                Arsip Surat >> Lihat
            </h1>
            <p class="text-muted mt-2">
                Nomor : {{ $arsip->nomor_surat }}<br>
                Kategori : {{ $arsip->kategori->nama_kategori }}<br>
                Judul : {{ $arsip->judul }}<br>
                Waktu Unggah : {{ $arsip->updated_at->format('Y-m-d H:i') }}
            </p>
        </div>

        <div class="card shadow-sm mb-7 mt-3">
            <div class="card-body p-4">
                @if ($arsip->file_surat)
                    <div class="pdf-preview">
                        <embed src="{{ asset($arsip->file_surat) }}" type="application/pdf">
                    </div>
                @else
                    <p class="text-center text-muted mb-0">Belum ada file PDF yang diunggah.</p>
                @endif
            </div>
        </div>

        <div class="d-flex gap-2 flex-wrap mt-3">
            <!-- Tombol Kembali -->
            <button type="button" class="btn btn-secondary d-flex align-items-center gap-2 px-4 py-2"
                onclick="window.location.href='{{ route('arsip.index') }}'">
                &laquo; Kembali
            </button>

            <!-- Tombol Download -->
            @if ($arsip->file_surat)
                <a href="{{ asset($arsip->file_surat) }}" class="btn btn-primary d-flex align-items-center gap-2 px-4 py-2"
                    download>
                    <i class="fas fa-download"></i> Download
                </a>
            @endif

            <!-- Tombol Edit -->
            <button type="button" class="btn btn-success d-flex align-items-center gap-2 px-4 py-2"
                onclick="window.location.href='{{ route('arsip.edit', $arsip->id_arsip) }}'">
                <i class="fas fa-edit"></i> Edit / Ganti File
            </button>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.delete-btn').on('click', function() {
                const judul = $(this).data('nama');
                const id = $(this).data('id');
                Swal.fire({
                    title: 'Peringatan',
                    html: `Apakah Anda yakin ingin menghapus arsip <strong>${judul}</strong>?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: '<i class="fas fa-trash"></i> Ya, Hapus!',
                    cancelButtonText: '<i class="fas fa-times"></i> Batal',
                    reverseButtons: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = `/arsip/${id}/delete`;
                    }
                });
            });
        });
    </script>
@endpush
