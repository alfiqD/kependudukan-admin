<?php $__env->startSection('content'); ?>
    <div class="py-4">
        <h2 class="mb-4">Detail Peristiwa Kematian</h2>

        
        <a href="<?php echo e(route('peristiwa_kematian.index')); ?>" class="btn btn-secondary mb-3">
            ← Kembali
        </a>

        <div class="row g-4">

            
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <strong>Informasi Kematian</strong>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered mb-0">
                            <tr>
                                <th width="40%">Nama Warga</th>
                                <td><?php echo e($kematian->warga->nama ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><?php echo e($kematian->warga->jenis_kelamin ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Meninggal</th>
                                <td><?php echo e($kematian->tgl_meninggal ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th>Tempat Meninggal</th>
                                <td><?php echo e($kematian->lokasi ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th>Sebab Meninggal</th>
                                <td><?php echo e($kematian->sebab ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th>No Surat Kematian</th>
                                <td><?php echo e($kematian->no_surat ?? '-'); ?></td>
                            </tr>
                        </table>

                        
                        <div class="mt-3 d-flex justify-content-end gap-2">
                            <a href="<?php echo e(route('peristiwa_kematian.edit', $kematian->kematian_id)); ?>"
                                class="btn btn-primary">
                                Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col-md-6">
                <div class="card shadow">
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
                                        <div class="card h-100 border">

                                            
                                            <?php if(Str::contains($m->mime_type, 'image')): ?>
                                                <?php
                                                    $fileUrl = Storage::disk('public')->exists('media/'.$m->file_name)
                                                        ? asset('storage/media/'.$m->file_name)
                                                        : asset('media/profile/images/placeholder.png');
                                                ?>
                                                <a href="<?php echo e($fileUrl); ?>" target="_blank">
                                                    <img src="<?php echo e($fileUrl); ?>"
                                                         class="card-img-top"
                                                         style="height:180px;object-fit:cover;">
                                                </a>
                                            <?php else: ?>
                                                
                                                <div class="p-4 text-center bg-light">
                                                    <i class="bi bi-file-earmark-text fs-1"></i>
                                                    <p class="small mt-2">
                                                        <?php echo e(Str::limit($m->file_name, 20)); ?>

                                                    </p>
                                                </div>
                                            <?php endif; ?>

                                            
                                            <div class="card-footer p-2 bg-white">
                                                <div class="d-flex gap-1">
                                                    <a href="<?php echo e(asset('storage/media/'.$m->file_name)); ?>"
                                                       target="_blank"
                                                       class="btn btn-outline-primary btn-sm flex-fill">
                                                        Lihat
                                                    </a>

                                                    <a href="<?php echo e(asset('storage/media/'.$m->file_name)); ?>"
                                                       download
                                                       class="btn btn-outline-success btn-sm flex-fill">
                                                        Download
                                                    </a>

                                                    <form action="<?php echo e(route('media.delete', $m->media_id)); ?>"
                                                          method="POST"
                                                          class="flex-fill">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit"
                                                                class="btn btn-outline-danger btn-sm w-100"
                                                                onclick="return confirm('Hapus file ini?')">
                                                            Hapus
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/peristiwa_kematian/detail.blade.php ENDPATH**/ ?>