<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Peristiwa Kelahiran</h1>

        
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($e); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        
        <style>
            .form-select,
            .form-control {
                background-color: #ffffff !important;
                color: #000 !important;
                border: 1px solid #ced4da !important;
                padding: 8px 12px !important;
                border-radius: 6px !important;
            }
        </style>

        <div class="card shadow mb-4">
            <div class="card-body">

                <form action="<?php echo e(route('peristiwa_kelahiran.update', $kelahiran->kelahiran_id)); ?>" method="POST"
                    enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    
                    <div class="row mb-3">

                        
                        <div class="col-md-6">
                            <label class="form-label">Nama Bayi</label>
                            <select name="warga_id" class="form-select" required>
                                <option value="">-- Pilih Anak --</option>
                                <?php $__currentLoopData = $anakList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($anak->warga_id); ?>"
                                        <?php echo e($kelahiran->warga_id == $anak->warga_id ? 'selected' : ''); ?>>
                                        <?php echo e($anak->nama); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" value="<?php echo e($kelahiran->tgl_lahir); ?>"
                                required>
                        </div>

                    </div>

                    
                    <div class="row mb-3">

                        
                        <div class="col-md-6">
                            <label class="form-label">Nama Ayah</label>
                            <select name="ayah_warga_id" class="form-select" required>
                                <option value="">-- Pilih Ayah --</option>
                                <?php $__currentLoopData = $ayahList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ayah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ayah->warga_id); ?>"
                                        <?php echo e($kelahiran->ayah_warga_id == $ayah->warga_id ? 'selected' : ''); ?>>
                                        <?php echo e($ayah->nama); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        
                        <div class="col-md-6">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control"
                                value="<?php echo e($kelahiran->tempat_lahir); ?>" required>
                        </div>

                    </div>

                    
                    <div class="row mb-3">

                        
                        <div class="col-md-6">
                            <label class="form-label">Nama Ibu</label>
                            <select name="ibu_warga_id" class="form-select" required>
                                <option value="">-- Pilih Ibu --</option>
                                <?php $__currentLoopData = $ibuList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ibu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ibu->warga_id); ?>"
                                        <?php echo e($kelahiran->ibu_warga_id == $ibu->warga_id ? 'selected' : ''); ?>>
                                        <?php echo e($ibu->nama); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        
                        <div class="col-md-6">
                            <label class="form-label">Nomor Akta</label>
                            <input type="text" name="no_akta" class="form-control" value="<?php echo e($kelahiran->no_akta); ?>"
                                required>
                        </div>

                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label">Upload Berkas (Multiple)</label>
                        <input type="file" name="media_files[]" class="form-control" multiple>
                        <small class="text-muted">
                            Anda bisa upload lebih dari 1 file. File lama tetap tersimpan.
                        </small>
                    </div>

                    
                    <div class="d-flex justify-content-end mt-3">
                        <a href="<?php echo e(route('peristiwa_kelahiran.index')); ?>" class="btn btn-secondary"
                            style="margin-right: 5px;">
                            Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/peristiwa_kelahiran/edit.blade.php ENDPATH**/ ?>