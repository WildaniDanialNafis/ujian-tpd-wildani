<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <!-- Header -->
    <h1 class="text-center text-lg fw-bold mb-5">Tentang</h1>

    <!-- Card Informasi Pengembang -->
    <div class="card shadow-sm border-0 p-4">
        <div class="d-flex flex-column flex-md-row align-items-center align-items-md-start gap-4">
            <!-- Foto Profil Lingkaran -->
            <div class="flex-shrink-0">
                <div class="rounded-circle overflow-hidden border border-secondary shadow-sm"
                     style="width: 160px; height: 160px;">
                    <img id="profileImage"
                         src="<?php echo e(asset('assets/wildanidanialnafis.jpg')); ?>"
                         alt="Foto profil Wildani Danial Nafis"
                         class="img-fluid w-100 h-100"
                         style="object-fit: cover;">
                </div>
            </div>

            <!-- Detail Info -->
            <div class="text-center text-md-start flex-fill">
                <h2 class="h5 fw-semibold mb-4">Dikembangkan oleh:</h2>
                <div class="mb-3">
                    <!-- Nama -->
                    <div class="row mb-2 align-items-center">
                        <div class="col-auto fw-medium text-secondary" style="width: 140px;">Nama</div>
                        <div class="col-auto">:</div>
                        <div class="col text-dark">Wildani Danial Nafis</div>
                    </div>
                    <!-- NIM -->
                    <div class="row mb-2 align-items-center">
                        <div class="col-auto fw-medium text-secondary" style="width: 140px;">NIM</div>
                        <div class="col-auto">:</div>
                        <div class="col text-dark">2231750007</div>
                    </div>
                    <!-- Prodi -->
                    <div class="row mb-2 align-items-center">
                        <div class="col-auto fw-medium text-secondary" style="width: 140px;">Prodi</div>
                        <div class="col-auto">:</div>
                        <div class="col text-dark">D-III Manajemen Informatika PSDKU Pamekasan</div>
                    </div>
                    <!-- Tanggal -->
                    <div class="row align-items-center">
                        <div class="col-auto fw-medium text-secondary" style="width: 140px;">Tanggal</div>
                        <div class="col-auto">:</div>
                        <div class="col text-dark">29 September 2025</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Note untuk Ujian TPD -->
        <div class="mt-4 pt-3 border-top text-center text-md-start text-muted fst-italic small">
            Aplikasi ini dikembangkan sebagai <strong>Pengembangan Aplikasi Web</strong> untuk <strong>Ujian TPD</strong>.<br>
            Dibangun dengan <strong>Laravel</strong> + <strong>Bootstrap 5</strong>.
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
        // Fallback gambar jika gagal load
        $('#profileImage').on('error', function() {
            $(this).attr('src', 'https://via.placeholder.com/160x160/e0e0e0/666666?text=WDN');
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/ujian-tpd-wildani/resources/views/about.blade.php ENDPATH**/ ?>