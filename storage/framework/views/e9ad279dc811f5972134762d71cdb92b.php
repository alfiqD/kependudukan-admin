<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Peristiwa Kematian</h1>

        
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

                <form action="<?php echo e(route('peristiwa_kematian.update', $kematian->kematian_id)); ?>"
                      method="POST" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    
                    <div class="row mb-3">

                        
                        <div class="col-md-6">
                            <label class="form-label">Nama Warga</label>
                            <select name="warga_id" class="form-select" required>
                                <option value="">-- Pilih Warga --</option>
                                <?php $__currentLoopData = $wargaList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($warga->warga_id); ?>"
                                        <?php echo e($kematian->warga_id == $warga->warga_id ? 'selected' : ''); ?>>
                                        <?php echo e($warga->nama); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Meninggal</label>
                            <input type="date" name="tgl_meninggal"
                                   class="form-control"
                                   value="<?php echo e($kematian->tgl_meninggal); ?>"
                                   required>
                        </div>

                    </div>

                    
                    <div class="row mb-3">

                        
                        <div class="col-md-6">
                            <label class="form-label">Sebab Kematian</label>
                            <input type="text" name="sebab"
                                   class="form-control"
                                   value="<?php echo e($kematian->sebab); ?>">
                        </div>

                        
                        <div class="col-md-6">
                            <label class="form-label">Lokasi Kematian</label>
                            <input type="text" name="lokasi"
                                   class="form-control"
                                   value="<?php echo e($kematian->lokasi); ?>">
                        </div>

                    </div>

                    
                    <div class="row mb-3">

                        
                        <div class="col-md-6">
                            <label class="form-label">Nomor Surat</label>
                            <input type="text" name="no_surat"
                                   class="form-control"
                                   value="<?php echo e($kematian->no_surat); ?>">
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
                        <a href="<?php echo e(route('peristiwa_kematian.index')); ?>"
                           class="btn btn-secondary"
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

<?php echo $__env->make('layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/peristiwa_kematian/edit.blade.php ENDPATH**/ ?>