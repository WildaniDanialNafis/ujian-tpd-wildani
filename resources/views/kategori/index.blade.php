@extends('layouts.app')

@section('title', 'Kategori Surat')

@section('content')
    <div class="px-3 px-md-4">

        <div class="mb-6">
            <h1 class="h2 fw-bold text-dark d-flex align-items-center gap-2">
                Kategori Surat
            </h1>
            <p class="text-muted mt-2">
                Berikut ini adalah daftar kategori surat.<br>
                Klik "Edit" pada kolom aksi untuk mengubah, atau "Hapus" untuk menghapus kategori.
            </p>
        </div>

        <!-- Search berdasarkan kategori -->
        <div class="d-flex align-items-center mb-7" style="max-width: 600px;">
            <label for="searchKategori" class="form-label fw-medium text-dark mb-0 me-3" style="white-space: nowrap;">
                Cari kategori:
            </label>
            <div class="input-group flex-grow-1">
                <span class="input-group-text bg-white border-end-0">
                    <i class="fas fa-search text-muted"></i>
                </span>
                <input type="text" id="searchKategori" class="form-control border-start-0 ps-0"
                    placeholder="Cari kategori...">
                <button type="button" class="btn btn-danger" id="clearKategori">&times;</button>
                <button type="button" class="btn btn-dark" id="btnSearchKategori">Cari!</button>
            </div>
        </div>

        <!-- Table -->
        <div class="card shadow-sm mb-7 mt-3">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle mb-0" id="kategoriTable">
                        <thead class="table-light">
                            <tr>
                                <th>ID Kategori</th>
                                <th>Nama Kategori</th>
                                <th>Keterangan</th>
                                <th style="width: 160px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $k)
                                <tr>
                                    <td class="fw-medium">{{ $k->id_kategori }}</td>
                                    <td>{{ $k->nama_kategori }}</td>
                                    <td class="text-muted">{{ $k->keterangan ?? '—' }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <form id="deleteForm{{ $k->id_kategori }}"
                                                action="{{ route('kategori.destroy', $k->id_kategori) }}" method="POST"
                                                style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $k->id_kategori }}"
                                                data-nama="{{ $k->nama_kategori }}">
                                                <i class="fas fa-trash me-1"></i> Hapus
                                            </button>
                                            <button class="btn btn-sm btn-primary"
                                                onclick="window.location.href='{{ route('kategori.edit', $k->id_kategori) }}'">
                                                <i class="fas fa-edit me-1"></i> Edit
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Tombol Tambah -->
        <div class="mt-3">
            <button id="btnTambah" class="btn btn-success d-flex align-items-center gap-2 px-4 py-2"
                onclick="window.location.href='{{ route('kategori.create') }}'">
                <i class="fas fa-plus"></i> Tambah Kategori Baru...
            </button>
        </div>

    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTable
            let table = $('#kategoriTable').DataTable({
                paging: true,
                ordering: true,
                info: true,
                language: {
                    lengthMenu: "Tampilkan _MENU_ data per halaman",
                    zeroRecords: "Data tidak ditemukan",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    infoEmpty: "Tidak ada data tersedia",
                    paginate: {
                        previous: "Sebelumnya",
                        next: "Berikutnya"
                    }
                },
                dom: 'tip'
            });

            // Tombol Search manual
            $('#btnSearchKategori').on('click', function() {
                const keyword = $('#searchKategori').val();
                table.column(1).search(keyword).draw(); // Kolom Nama Kategori
            });

            // Tombol Clear
            $('#clearKategori').on('click', function() {
                $('#searchKategori').val('');
                table.column(1).search('').draw();
            });

            // Reset otomatis saat input dikosongkan
            $('#searchKategori').on('input', function() {
                if ($(this).val() === '') {
                    table.column(1).search('').draw();
                }
            });

            // Tombol Hapus dengan SweetAlert
            $('.delete-btn').on('click', function() {
                const nama = $(this).data('nama');
                const id = $(this).data('id');

                Swal.fire({
                    title: 'Peringatan',
                    html: `Apakah Anda yakin ingin menghapus kategori <strong>${nama}</strong>?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: '<i class="fas fa-trash"></i> Ya, Hapus!',
                    cancelButtonText: '<i class="fas fa-times"></i> Batal',
                    reverseButtons: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#deleteForm' + id).submit();
                    }
                });
            });
        });
    </script>
@endpush
