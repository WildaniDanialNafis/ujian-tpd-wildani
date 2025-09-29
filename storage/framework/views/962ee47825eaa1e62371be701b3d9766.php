<?php $__env->startSection('title', 'Edit Kategori'); ?>

<?php $__env->startSection('content'); ?>
    <div class="px-3 px-md-4">
        <div class="mb-6 mx-auto">
            <h1 class="h2 fw-bold text-dark d-flex align-items-center gap-2">
                Kategori Surat >> Edit
            </h1>
            <p class="text-muted mt-2">
                Edit data kategori sesuai kebutuhan. Jika sudah selesai, jangan lupa untuk<br />
                <span class="d-block mt-1">mengklik tombol "Update".</span>
            </p>
        </div>

        <div class="bg-white border rounded-3 p-5 w-100 mx-auto">
            <form id="formEdit" class="row g-4 align-items-center"
                action="<?php echo e(route('kategori.update', $kategori->id_kategori)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <!-- ID Kategori (readonly) -->
                <div class="col-md-3">
                    <label for="idKategori" class="form-label fw-medium text-dark mb-0">ID (Auto Increment)*</label>
                </div>
                <div class="col-md-9">
                    <input id="idKategori" type="text" class="form-control" value="<?php echo e($kategori->id_kategori); ?>"
                        disabled>
                </div>

                <!-- Nama Kategori -->
                <div class="col-md-3">
                    <label for="namaKategori" class="form-label fw-medium text-dark mb-0">
                        Nama Kategori*
                    </label>
                </div>
                <div class="col-md-9">
                    <input id="namaKategori" name="nama_kategori" type="text" class="form-control"
                        value="<?php echo e(old('nama_kategori', $kategori->nama_kategori)); ?>"
                        placeholder="Contoh: Undangan, Pemberitahuan, dll" maxlength="50" required
                        oninvalid="this.setCustomValidity('Nama kategori wajib diisi')"
                        oninput="this.setCustomValidity('')" />
                </div>

                <!-- Keterangan -->
                <div class="col-md-3">
                    <label for="keterangan" class="form-label fw-medium text-dark mb-0">
                        Keterangan
                    </label>
                </div>
                <div class="col-md-9">
                    <textarea id="keterangan" name="keterangan" class="form-control" rows="3"
                        placeholder="Deskripsi singkat tentang kategori ini (opsional)"><?php echo e(old('keterangan', $kategori->keterangan)); ?></textarea>
                </div>

                <!-- Tombol -->
                <div class="col-12 pt-2">
                    <div class="d-flex gap-3">
                        <a href="<?php echo e(route('kategori.index')); ?>" class="btn btn-secondary d-flex align-items-center gap-2">
                            &laquo; Kembali
                        </a>
                        <button type="submit" class="btn btn-success d-flex align-items-center gap-2">
                            <i class="fas fa-save"></i> Ubah
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
            // Validasi form sebelum submit
            $('#formEdit').on('submit', function(e) {
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
            <?php if(session('success')): ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data Berhasil Diubah',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    // redirect setelah 2 detik
                    window.location.href = "<?php echo e(route('kategori.index')); ?>";
                });
            <?php endif; ?>
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/ujian-tpd-wildani/resources/views/kategori/edit.blade.php ENDPATH**/ ?>