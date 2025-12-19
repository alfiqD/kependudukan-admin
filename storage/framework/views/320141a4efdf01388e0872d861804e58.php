<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Peristiwa Pindah</h1>

        
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
            .form-control,
            textarea.form-control {
                background-color: #ffffff !important;
                color: #000 !important;
                border: 1px solid #ced4da !important;
                padding: 10px 12px !important;
                border-radius: 6px !important;
            }

            .form-group-custom {
                margin-bottom: 20px;
            }
        </style>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="<?php echo e(route('peristiwa_pindah.update', $pindah->pindah_id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label class="form-label">Nama Warga</label>
                                <select name="warga_id" class="form-select" required>
                                    <option value="">-- Pilih Warga --</option>
                                    <?php $__currentLoopData = $wargaList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($warga->warga_id); ?>"
                                            <?php echo e(old('warga_id', $pindah->warga_id) == $warga->warga_id ? 'selected' : ''); ?>>
                                            <?php echo e($warga->nama); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label class="form-label">Tanggal Pindah</label>
                                <input type="date" name="tgl_pindah" class="form-control"
                                    value="<?php echo e(old('tgl_pindah', $pindah->tgl_pindah)); ?>" required>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label class="form-label">Alamat Tujuan</label>
                                <textarea name="alamat_tujuan" rows="3" class="form-control" required><?php echo e(old('alamat_tujuan', $pindah->alamat_tujuan)); ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label class="form-label">Alasan Pindah</label>
                                <input type="text" name="alasan" class="form-control" value="<?php echo e(old('alasan', $pindah->alasan)); ?>">
                            </div>
                        </div>
                    </div>

                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label class="form-label">Nomor Surat Pindah</label>
                                <input type="text" name="no_surat" class="form-control" value="<?php echo e(old('no_surat', $pindah->no_surat)); ?>">
                            </div>
                        </div>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label">Upload Berkas (Multiple)</label>
                        <input type="file" name="media_files[]" class="form-control" multiple>
                        <small class="text-muted">
                            Anda bisa upload lebih dari 1 file.
                        </small>
                    </div>

                    
                    <div class="d-flex justify-content-end mt-3">
                        <a href="<?php echo e(route('peristiwa_pindah.index')); ?>" class="btn btn-secondary me-2">
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

<?php echo $__env->make('layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/peristiwa_pindah/edit.blade.php ENDPATH**/ ?>