<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <h1 class="h3 mb-3 text-gray-800">Edit Anggota Keluarga</h1>


        <div class="card shadow mb-4 p-4">
            <form action="<?php echo e(route('anggota_keluarga.update', $anggota->anggota_id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="form-group mb-3">
                    <label for="anggota_id">ID Anggota</label>
                    <input type="text" name="anggota_id" id="anggota_id" class="form-control"
                        value="<?php echo e($anggota->anggota_id); ?>" required>
                </div>


                <div class="form-group mb-3">
                    <label for="kk_id">Nomor KK</label>
                    <select name="kk_id" id="kk_id" class="form-control">
                        <?php $__currentLoopData = $kk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->kk_id); ?>" <?php echo e($anggota->kk_id == $item->kk_id ? 'selected' : ''); ?>>
                                <?php echo e($item->kk_nomor); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>


                <div class="form-group mb-3">
                    <label for="warga_id">Nama Warga</label>
                    <select name="warga_id" id="warga_id" class="form-control">
                        <?php $__currentLoopData = $warga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->warga_id); ?>"
                                <?php echo e($anggota->warga_id == $item->warga_id ? 'selected' : ''); ?>>
                                <?php echo e($item->nama); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>


                <div class="form-group mb-3">
                    <label for="hubungan">Hubungan Dalam Keluarga</label>
                    <input type="text" name="hubungan" id="hubungan" class="form-control"
                        value="<?php echo e($anggota->hubungan); ?>">
                </div>


                <div class="d-flex justify-content-end mt-3">
                    <a href="<?php echo e(route('anggota_keluarga.index')); ?>" class="btn btn-secondary" style="margin-right: 5px;">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>
                </div>




            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/anggota_keluarga/edit.blade.php ENDPATH**/ ?>