<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Kartu Keluarga</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
        <form action="<?php echo e(route('keluarga_kk.update', $keluargaKK->kk_id)); ?>" method="POST">

                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kk_nomor">Nomor Kartu Keluarga</label>
                            <input type="text" name="kk_nomor" id="kk_nomor" class="form-control"
                                value="<?php echo e(old('kk_nomor', $keluargaKK->kk_nomor)); ?>" placeholder="Masukkan Nomor KK" required>
                        </div>

                        <div class="form-group mt-3">
    <label for="kepala_keluarga_warga_id">Nama Kepala Keluarga</label>
    <select name="kepala_keluarga_warga_id" id="kepala_keluarga_warga_id" class="form-control" required>
        <option value="">-- Pilih Kepala Keluarga --</option>
        <?php $__currentLoopData = $warga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($item->warga_id); ?>"
                <?php echo e(old('kepala_keluarga_warga_id', $keluargaKK->kepala_keluarga_warga_id) == $item->warga_id ? 'selected' : ''); ?>>
                <?php echo e($item->nama); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>

                        <div class="form-group mt-3">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat" required><?php echo e(old('alamat', $keluargaKK->alamat)); ?></textarea>
                        </div>
                    </div>

                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="rt">RT</label>
                            <input type="text" name="rt" id="rt" class="form-control"
                                value="<?php echo e(old('rt', $keluargaKK->rt)); ?>" placeholder="Masukkan RT" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="rw">RW</label>
                            <input type="text" name="rw" id="rw" class="form-control"
                                value="<?php echo e(old('rw', $keluargaKK->rw)); ?>" placeholder="Masukkan RW" required>
                        </div>

                        
                        <div class="form-group mt-4 text-right">
                            <a href="<?php echo e(route('keluarga_kk.index')); ?>" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/keluarga/edit.blade.php ENDPATH**/ ?>