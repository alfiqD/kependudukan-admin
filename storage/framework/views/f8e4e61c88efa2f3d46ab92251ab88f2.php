<?php $__env->startSection('content'); ?>
    <div class="py-4">

        <h2 class="mb-4">Detail Peristiwa Kelahiran</h2>

        
        <a href="<?php echo e(route('peristiwa_kelahiran.index')); ?>" class="btn btn-secondary mb-3">
            ← Kembali
        </a>

        
        <div class="row g-4">

            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <strong>Informasi Kelahiran</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered mb-0">
                            <tr>
                                <th width="40%">Nama Bayi</th>
                                <td><?php echo e($kelahiran->anak->nama ?? $kelahiran->nama_bayi); ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin Bayi</th>
                                <td><?php echo e($kelahiran->anak->jenis_kelamin ?? $kelahiran->jenis_kelamin); ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td><?php echo e($kelahiran->tgl_lahir ?? $kelahiran->tanggal_lahir); ?></td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td><?php echo e($kelahiran->tempat_lahir); ?></td>
                            </tr>
                            <tr>
                                <th>No Akta</th>
                                <td><?php echo e($kelahiran->no_akta); ?></td>
                            </tr>
                            <tr>
                                <th>Nama Ayah</th>
                                <td><?php echo e($kelahiran->ayah->nama ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th>Nama Ibu</th>
                                <td><?php echo e($kelahiran->ibu->nama ?? '-'); ?></td>
                            </tr>
                        </table>

                        
                        <div class="mt-3 d-flex justify-content-end gap-2">

                            <a href="<?php echo e(route('peristiwa_kelahiran.edit', $kelahiran->kelahiran_id)); ?>"
                                class="btn btn-primary">
                                Edit
                            </a>
                        </div>

                    </div>
                </div>
            </div>


            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <strong>Foto / Dokumen Pendukung</strong>
                    </div>
                    <div class="card-body">
                        <?php if($media->count() == 0): ?>
                            <p class="text-muted">Belum ada file media yang diupload.</p>
                        <?php else: ?>
                            <div class="row row-cols-2 g-3">
                                <?php $__currentLoopData = $media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col">
                                        <div class="card h-100">

                                            
                                            <?php if(Str::contains($m->mime_type, 'image')): ?>
                                                <a href="<?php echo e(asset('storage/media/' . $m->file_name)); ?>" target="_blank">
                                                    <img src="<?php echo e(asset('storage/media/' . $m->file_name)); ?>"
                                                        class="card-img-top" style="height: 160px; object-fit: cover;">
                                                </a>
                                            <?php else: ?>
                                                
                                                <div class="p-4 text-center">
                                                    <i class="bi bi-file-earmark-text fs-1"></i>
                                                    <p class="mt-2" style="font-size: 12px;"><?php echo e($m->file_name); ?></p>
                                                </div>
                                            <?php endif; ?>

                                            
                                            <div class="card-footer d-flex justify-content-center gap-3">

                                                <a href="<?php echo e(asset('storage/media/' . $m->file_name)); ?>" target="_blank"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="bi bi-eye"></i> Lihat
                                                </a>

                                                <form action="<?php echo e(route('media.delete', $m->media_id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>

                                                    <button type="button" class="btn btn-sm btn-danger btn-delete">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </form>

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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/peristiwa_kelahiran/detail.blade.php ENDPATH**/ ?>