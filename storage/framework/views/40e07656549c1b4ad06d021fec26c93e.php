<?php $__env->startSection('title', 'Arsip Surat'); ?>

<?php $__env->startSection('content'); ?>
    <div class="px-3 px-md-4">

        <div class="mb-6">
            <h1 class="h2 fw-bold text-dark d-flex align-items-center gap-2">
                Arsip Surat
            </h1>
            <p class="text-muted mt-2">
                Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
                Klik "Lihat" pada kolom aksi untuk menampilkan detail arsip
            </p>
        </div>

        <!-- Search -->
        <div class="d-flex align-items-center mb-7" style="max-width: 600px;">
            <label for="search" class="form-label fw-medium text-dark mb-0 me-3" style="white-space: nowrap;">
                Cari judul:
            </label>
            <div class="input-group flex-grow-1">
                <span class="input-group-text bg-white border-end-0">
                    <i class="fas fa-search text-muted"></i>
                </span>
                <input type="text" id="search" class="form-control border-start-0 ps-0" placeholder="Cari judul...">
                <button type="button" class="btn btn-danger" id="clearSearch">&times;</button>
                <button type="button" class="btn btn-dark" id="btnSearch">Cari!</button>
            </div>
        </div>

        <!-- Table -->
        <div class="card shadow-sm mb-7 mt-3">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle mb-0" id="arsipTable">
                        <thead class="table-light">
                            <tr>
                                <th>Nomor Surat</th>
                                <th>Kategori</th>
                                <th>Judul</th>
                                <th>Waktu Pengarsipan</th>
                                <th style="width: 180px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $arsip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($a->nomor_surat); ?></td>
                                    <td><?php echo e($a->kategori->nama_kategori ?? '-'); ?></td>
                                    <td><?php echo e($a->judul); ?></td>
                                    <td><?php echo e($a->updated_at->format('Y-m-d H:i')); ?></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <form id="deleteForm<?php echo e($a->id_arsip); ?>"
                                                action="<?php echo e(route('arsip.destroy', $a->id_arsip)); ?>" method="POST"
                                                style="display:none;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                            </form>
                                            <button class="btn btn-sm btn-danger d-flex align-items-center gap-1 delete-btn"
                                                data-id="<?php echo e($a->id_arsip); ?>" data-nama="<?php echo e($a->judul); ?>">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                            <button class="btn btn-sm btn-warning text-dark d-flex align-items-center gap-1"
                                                onclick="window.location.href='<?php echo e(route('arsip.edit', $a->id_arsip)); ?>'">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <button class="btn btn-sm btn-primary d-flex align-items-center gap-1"
                                                onclick="window.location.href='<?php echo e(route('arsip.show', $a->id_arsip)); ?>'">
                                                <i class="fas fa-eye"></i> Lihat
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Tombol Tambah Arsip -->
        <div class="mt-3">
            <button type="button" class="btn btn-success d-flex align-items-center gap-2 px-4 py-2"
                onclick="window.location.href='<?php echo e(route('arsip.create')); ?>'">
                <i class="fas fa-plus"></i> Tambah Arsip Baru...
            </button>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            let table = $('#arsipTable').DataTable({
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

            // Tombol Search
            $('#btnSearch').on('click', function() {
                const keyword = $('#search').val();
                table.column(2).search(keyword).draw(); // Kolom Judul index 2
            });

            // Tombol Clear
            $('#clearSearch').on('click', function() {
                $('#search').val('');
                table.column(2).search('').draw();
            });

            // Reset otomatis jika input dikosongkan
            $('#search').on('input', function() {
                if ($(this).val() === '') {
                    table.column(2).search('').draw();
                }
            });

            // Tombol Hapus dengan SweetAlert
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
                        $('#deleteForm' + id).submit();
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/ujian-tpd-wildani/resources/views/arsip/index.blade.php ENDPATH**/ ?>