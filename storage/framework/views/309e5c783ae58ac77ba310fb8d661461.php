<?php $__env->startSection('title', 'Edit Arsip'); ?>

<?php $__env->startSection('content'); ?>
    <div class="px-3 px-md-4">
        <div class="mb-6 mx-auto">
            <h1 class="h2 fw-bold text-dark d-flex align-items-center gap-2">
                Arsip Surat >> Edit
            </h1>
            <p class="text-muted mt-2">
                Edit arsip melalui form di bawah ini.<br />
                <span class="d-block mt-1">Jangan lupa klik tombol "Simpan" setelah selesai.</span>
            </p>
        </div>

        <div class="bg-white border rounded-3 p-5 w-100 mx-auto">
            <form id="formEditArsip" class="row g-4 align-items-center" action="<?php echo e(route('arsip.update', $arsip->id_arsip)); ?>"
                method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <!-- Kategori -->
                <div class="col-md-3">
                    <label for="kategori" class="form-label fw-medium text-dark mb-0">Kategori*</label>
                </div>
                <div class="col-md-9">
                    <select id="kategori" name="kategori_id" class="form-select" required
                        oninvalid="this.setCustomValidity('Kategori wajib diisi')" oninput="this.setCustomValidity('')">
                        <option value="">-- Pilih Kategori --</option>
                        <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($k->id_kategori); ?>"
                                <?php echo e($arsip->kategori_id == $k->id_kategori ? 'selected' : ''); ?>>
                                <?php echo e($k->nama_kategori); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Nomor Surat -->
                <div class="col-md-3">
                    <label for="nomorSurat" class="form-label fw-medium text-dark mb-0">Nomor Surat*</label>
                </div>
                <div class="col-md-9">
                    <input id="nomorSurat" name="nomor_surat" type="text" class="form-control"
                        value="<?php echo e($arsip->nomor_surat); ?>" placeholder="Nomor surat" required
                        oninvalid="this.setCustomValidity('Nomor surat wajib diisi')" oninput="this.setCustomValidity('')"
                        maxlength="255" />
                </div>

                <!-- Judul -->
                <div class="col-md-3">
                    <label for="judul" class="form-label fw-medium text-dark mb-0">Judul*</label>
                </div>
                <div class="col-md-9">
                    <input id="judul" name="judul" type="text" class="form-control" value="<?php echo e($arsip->judul); ?>"
                        placeholder="Judul arsip" required oninvalid="this.setCustomValidity('Judul wajib diisi')"
                        oninput="this.setCustomValidity('')" maxlength="255" />
                </div>

                <!-- File PDF -->
                <div class="col-md-3">
                    <label for="fileSurat" class="form-label fw-medium text-dark mb-0">File Surat</label>
                </div>
                <div class="col-md-9">
                    <input id="fileSurat" name="file_surat" type="file" class="form-control" accept=".pdf" />

                    <?php if($arsip->file_surat): ?>
                        <small class="text-muted d-block mt-1">
                            File saat ini: <a href="<?php echo e(asset($arsip->file_surat)); ?>" target="_blank">Download PDF</a>
                        </small>
                    <?php else: ?>
                        <small class="text-muted d-block mt-1">
                            Belum ada file PDF yang diunggah.
                        </small>
                    <?php endif; ?>

                    <small class="text-muted">Opsional. Format: PDF, maksimal 2MB.</small>
                </div>

                <!-- Tombol -->
                <div class="col-12 pt-2">
                    <div class="d-flex gap-3">
                        <a href="<?php echo e(route('arsip.index')); ?>" class="btn btn-secondary d-flex align-items-center gap-2">
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function() {
        $('#formEditArsip').on('submit', function(e) {
            e.preventDefault(); // cegah submit default

            const form = $(this)[0];
            const formData = new FormData(form);

            // Validasi sederhana client-side
            const kategori = $('#kategori').val();
            const nomor = $('#nomorSurat').val().trim();
            const judul = $('#judul').val().trim();

            if (!kategori || !nomor || !judul) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Semua field wajib diisi.',
                    timer: 1500,
                    showConfirmButton: false
                });
                return;
            }

            // Kirim AJAX untuk update
            $.ajax({
                url: "<?php echo e(route('arsip.update', $arsip->id_arsip)); ?>",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-HTTP-Method-Override': 'PUT' // karena method PUT
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: response.message ?? 'Data berhasil diubah.',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = "<?php echo e(route('arsip.index')); ?>";
                    });
                },
                error: function(xhr) {
                    let errorMsg = 'Terjadi kesalahan.';
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        errorMsg = Object.values(xhr.responseJSON.errors).flat().join('\n');
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: errorMsg,
                    });
                }
            });
        });

        // Alert sukses dari session flash (optional)
        <?php if(session('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Data Berhasil Diubah',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = "<?php echo e(route('arsip.index')); ?>";
            });
        <?php endif; ?>
    });
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/ujian-tpd-wildani/resources/views/arsip/edit.blade.php ENDPATH**/ ?>