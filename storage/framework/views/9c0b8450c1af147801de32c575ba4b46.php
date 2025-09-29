<?php $__env->startSection('title', 'Arsip Surat'); ?>

<?php $__env->startPush('styles'); ?>
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
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="px-3 px-md-4">

        <div class="mb-6">
            <h1 class="h2 fw-bold text-dark d-flex align-items-center gap-2">
                Arsip Surat >> Lihat
            </h1>
            <p class="text-muted mt-2">
                Nomor : <?php echo e($arsip->nomor_surat); ?><br>
                Kategori : <?php echo e($arsip->kategori->nama_kategori); ?><br>
                Judul : <?php echo e($arsip->judul); ?><br>
                Waktu Unggah : <?php echo e($arsip->updated_at->format('Y-m-d H:i')); ?>

            </p>
        </div>

        <div class="card shadow-sm mb-7 mt-3">
            <div class="card-body p-4">
                <?php if($arsip->file_surat): ?>
                    <div class="pdf-preview">
                        <embed src="<?php echo e(asset($arsip->file_surat)); ?>" type="application/pdf">
                    </div>
                <?php else: ?>
                    <p class="text-center text-muted mb-0">Belum ada file PDF yang diunggah.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="d-flex gap-2 flex-wrap mt-3">
            <!-- Tombol Kembali -->
            <button type="button" class="btn btn-secondary d-flex align-items-center gap-2 px-4 py-2"
                onclick="window.location.href='<?php echo e(route('arsip.index')); ?>'">
                &laquo; Kembali
            </button>

            <!-- Tombol Download -->
            <?php if($arsip->file_surat): ?>
                <a href="<?php echo e(asset($arsip->file_surat)); ?>" class="btn btn-primary d-flex align-items-center gap-2 px-4 py-2"
                    download>
                    <i class="fas fa-download"></i> Download
                </a>
            <?php endif; ?>

            <!-- Tombol Edit -->
            <button type="button" class="btn btn-success d-flex align-items-center gap-2 px-4 py-2"
                onclick="window.location.href='<?php echo e(route('arsip.edit', $arsip->id_arsip)); ?>'">
                <i class="fas fa-edit"></i> Edit / Ganti File
            </button>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/ujian-tpd-wildani/resources/views/arsip/show.blade.php ENDPATH**/ ?>