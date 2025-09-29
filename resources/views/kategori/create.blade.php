@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="px-3 px-md-4">
        <div class="mb-6 mx-auto">
            <h1 class="h2 fw-bold text-dark d-flex align-items-center gap-2">
                Kategori Surat >> Tambah
            </h1>
            <p class="text-muted mt-2">
                Tambahkan atau edit data kategori. Jika sudah selesai, jangan lupa untuk<br />
                <span class="d-block mt-1">mengklik tombol "Simpan".</span>
            </p>
        </div>

        <div class="bg-white border rounded-3 p-5 w-100 mx-auto">
            <form id="formTambah" class="row g-4 align-items-center" action="{{ route('kategori.store') }}" method="POST">
                @csrf

                <!-- ID Otomatis -->
                <div class="col-md-3">
                    <label for="idKategori" class="form-label fw-medium text-dark mb-0">ID (Auto Increment)*</label>
                </div>
                <div class="col-md-9">
                    <input id="idKategori" type="text" class="form-control" value="{{ $nextId }}" disabled>
                </div>

                <!-- Nama Kategori -->
                <div class="col-md-3">
                    <label for="namaKategori" class="form-label fw-medium text-dark mb-0">Nama Kategori*</label>
                </div>
                <div class="col-md-9">
                    <input id="namaKategori" name="nama_kategori" type="text" class="form-control"
                        placeholder="Contoh: Undangan, Pemberitahuan, dll" maxlength="50" required
                        oninvalid="this.setCustomValidity('Nama kategori wajib diisi')"
                        oninput="this.setCustomValidity('')" />
                </div>

                <!-- Keterangan -->
                <div class="col-md-3">
                    <label for="keterangan" class="form-label fw-medium text-dark mb-0">Keterangan</label>
                </div>
                <div class="col-md-9">
                    <textarea id="keterangan" name="keterangan" class="form-control" rows="3"
                        placeholder="Deskripsi singkat tentang kategori ini (opsional)"></textarea>
                </div>

                <!-- Tombol -->
                <div class="col-12 pt-2">
                    <div class="d-flex gap-3">
                        <a href="{{ route('kategori.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                            &laquo; Kembali
                        </a>
                        <button type="submit" class="btn btn-success d-flex align-items-center gap-2">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#formTambah').on('submit', function(e) {
                const nama = $('#namaKategori').val().trim();
                if (!nama) {
                    e.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Nama kategori tidak boleh kosong.',
                        timer: 1500,
                        showConfirmButton: false
                    });
                    return;
                }
            });

            // Alert sukses dari session flash
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data Berhasil Disimpan',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = "{{ route('kategori.index') }}"; // redirect setelah alert
                });
            @endif
        });
    </script>
@endpush
