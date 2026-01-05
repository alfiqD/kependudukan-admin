<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <h1 class="h3 mb-3 text-gray-800">Tambah Anggota Keluarga</h1>

        <div class="card shadow mb-4 p-4">
            <form action="<?php echo e(route('anggota_keluarga.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                
                <div class="form-group mb-3">
                    <label for="anggota_id">ID Anggota</label>
                    <input type="text" name="anggota_id" id="anggota_id" class="form-control"
                        placeholder="Masukkan ID anggota">
                </div>

                <div class="form-group mb-3">
                    <label for="kk_id">Nomor KK</label>
                    <select name="kk_id" id="kk_id" class="form-control">
                        <option value="">-- Pilih Nomor KK --</option>
                        <?php $__currentLoopData = $kk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->kk_id); ?>"><?php echo e($item->kk_nomor); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="warga_id">Nama Warga</label>
                    <select name="warga_id" id="warga_id" class="form-control">
                        <option value="">-- Pilih Warga --</option>
                        <?php $__currentLoopData = $warga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->warga_id); ?>"><?php echo e($item->nama); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="hubungan">Hubungan Dalam Keluarga</label>
                    <input type="text" name="hubungan" id="hubungan" class="form-control"
                        placeholder="Contoh: kepala keluarga, istri, anak, orang tua, lainnya">
                </div>

                
                        <div class="form-group mt-4 text-right">
                            <a href="<?php echo e(route('anggota_keluarga.index')); ?>" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/anggota_keluarga/create.blade.php ENDPATH**/ ?>