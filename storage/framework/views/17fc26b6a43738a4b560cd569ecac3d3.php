<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Warga</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?php echo e(route('warga.update', $warga->warga_id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>No. KTP</label>
                            <input type="text" name="no_ktp" class="form-control"
                                value="<?php echo e(old('no_ktp', $warga->no_ktp)); ?>" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control"
                                value="<?php echo e(old('nama', $warga->nama)); ?>" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="L" <?php echo e($warga->jenis_kelamin == 'L' ? 'selected' : ''); ?>>Laki-laki</option>
                                <option value="P" <?php echo e($warga->jenis_kelamin == 'P' ? 'selected' : ''); ?>>Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label>Agama</label>
                            <input type="text" name="agama" class="form-control"
                                value="<?php echo e(old('agama', $warga->agama)); ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control"
                                value="<?php echo e(old('pekerjaan', $warga->pekerjaan)); ?>" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>No. Telepon</label>
                            <input type="text" name="telp" class="form-control"
                                value="<?php echo e(old('telp', $warga->telp)); ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"
                                value="<?php echo e(old('email', $warga->email)); ?>">
                        </div>

                        <div class="form-group mt-4 text-right">
                            <a href="<?php echo e(route('warga.index')); ?>" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/warga/edit.blade.php ENDPATH**/ ?>