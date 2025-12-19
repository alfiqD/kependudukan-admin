<?php $__env->startSection('content'); ?>
<div class="py-4">
    <h2 class="mb-4">Detail Peristiwa Pindah</h2>

    
    <a href="<?php echo e(route('peristiwa_pindah.index')); ?>" class="btn btn-secondary mb-3">
        ← Kembali
    </a>

    
    <div class="row g-4">
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <strong>Informasi Pindah</strong>
                </div>
                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <tr>
                            <th width="40%">Nama Warga</th>
                            <td><?php echo e($pindah->warga->nama ?? '-'); ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Pindah</th>
                            <td><?php echo e($pindah->tgl_pindah ?? '-'); ?></td>
                        </tr>
                        <tr>
                            <th>Alamat Tujuan</th>
                            <td><?php echo e($pindah->alamat_tujuan ?? '-'); ?></td>
                        </tr>
                        <tr>
                            <th>Alasan Pindah</th>
                            <td><?php echo e($pindah->alasan ?? '-'); ?></td>
                        </tr>
                        <tr>
                            <th>Nomor Surat Pindah</th>
                            <td><?php echo e($pindah->no_surat ?? '-'); ?></td>
                        </tr>
                    </table>

                    
                    <div class="mt-3 d-flex justify-content-end gap-2">
                        <a href="<?php echo e(route('peristiwa_pindah.edit', $pindah->pindah_id)); ?>" class="btn btn-primary">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <strong>Dokumen / Foto Pendukung</strong>
                </div>
                <div class="card-body">
                    <?php if(!isset($media) || $media->count() == 0): ?>
                        <div class="text-center">
                            <img src="<?php echo e(asset('media/profile/images/placeholder.png')); ?>"
                                 alt="No Image"
                                 style="width: 100%; max-width: 200px; object-fit: cover;">
                            <p class="text-muted mt-2">Belum ada file media yang diupload.</p>
                        </div>
                    <?php else: ?>
                        <div class="row row-cols-2 g-3">
                            <?php $__currentLoopData = $media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col">
                                    <div class="card h-100 border">
                                        <?php
                                            $fileExists = $m->file_name && Storage::disk('public')->exists('media/' . $m->file_name);
                                            $fileUrl = $fileExists ? asset('storage/media/' . $m->file_name) : asset('media/profile/images/placeholder.jpg');
                                        ?>

                                        <?php if(Str::contains($m->mime_type, 'image')): ?>
                                            <a href="<?php echo e($fileUrl); ?>" target="_blank">
                                                <img src="<?php echo e($fileUrl); ?>" class="card-img-top"
                                                     style="height: 180px; object-fit: cover;"
                                                     alt="<?php echo e($m->file_name ?? 'File'); ?>">
                                            </a>
                                        <?php else: ?>
                                            <div class="p-4 text-center bg-light">
                                                <?php if(Str::contains($m->mime_type, 'pdf')): ?>
                                                    <i class="bi bi-file-earmark-pdf fs-1 text-danger"></i>
                                                <?php elseif(Str::contains($m->mime_type, 'word') || Str::contains($m->mime_type, 'document')): ?>
                                                    <i class="bi bi-file-earmark-word fs-1 text-primary"></i>
                                                <?php else: ?>
                                                    <i class="bi bi-file-earmark-text fs-1 text-secondary"></i>
                                                <?php endif; ?>
                                                <p class="mt-2 text-truncate small px-2" style="font-size: 12px;"
                                                   title="<?php echo e($m->file_name); ?>">
                                                    <?php echo e(Str::limit($m->file_name, 20)); ?>

                                                </p>
                                            </div>
                                        <?php endif; ?>

                                        
                                        <div class="card-footer p-2 bg-white">
                                            <div class="d-flex justify-content-between gap-1">
                                                <a href="<?php echo e($fileUrl); ?>" target="_blank"
                                                   class="btn btn-outline-primary btn-sm flex-fill d-flex align-items-center justify-content-center gap-1">
                                                    <i class="bi bi-eye fs-6"></i>
                                                    <span class="d-none d-sm-inline">Lihat</span>
                                                </a>

                                                <a href="<?php echo e($fileUrl); ?>" download
                                                   class="btn btn-outline-success btn-sm flex-fill d-flex align-items-center justify-content-center gap-1">
                                                    <i class="bi bi-download fs-6"></i>
                                                    <span class="d-none d-sm-inline">Download</span>
                                                </a>

                                                <form action="<?php echo e(route('media.delete', $m->media_id)); ?>" method="POST"
                                                      class="d-inline m-0 flex-fill">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="button"
                                                            class="btn btn-outline-danger btn-sm w-100 d-flex align-items-center justify-content-center gap-1 btn-delete">
                                                        <i class="bi bi-trash fs-6"></i>
                                                        <span class="d-none d-sm-inline">Hapus</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('form');
            Swal.fire({
                title: 'Yakin ingin menghapus file?',
                text: "File yang dihapus tidak dapat dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>

<style>
.card-footer .btn {
    padding: 0.35rem 0.5rem;
    font-size: 0.8rem;
    border-radius: 6px;
    transition: all 0.2s ease;
    min-height: 36px;
}
.card-footer .btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
.card-footer .btn:active {
    transform: translateY(0);
}
.card-footer .btn i { font-size: 0.9rem; }

@media (max-width: 576px) {
    .card-footer .btn {
        padding: 0.25rem 0.4rem;
        font-size: 0.75rem;
        min-height: 32px;
    }
    .card-footer .btn i { font-size: 0.8rem; margin-right: 2px; }
}

.btn-outline-primary:hover { background-color: #0d6efd; color: white; }
.btn-outline-success:hover { background-color: #198754; color: white; }
.btn-outline-danger:hover { background-color: #dc3545; color: white; }

.card { transition: transform 0.2s ease; }
.card:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/peristiwa_pindah/detail.blade.php ENDPATH**/ ?>