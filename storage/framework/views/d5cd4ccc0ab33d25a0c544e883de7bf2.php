<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Tambah Data Warga</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="<?php echo e(route('warga.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_ktp">Nomor KTP</label>
                                <input type="text" name="no_ktp" id="no_ktp" class="form-control"
                                    placeholder="Masukkan Nomor KTP" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    placeholder="Masukkan Nama Lengkap" required>
                            </div>

                            <div class="form-group">
                                <label for="jenis_kelamin" class="font-weight-bold text-primary">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki" <?php echo e(old('jenis_kelamin') == 'Laki-laki' ? 'selected' : ''); ?>>
                                        Laki-laki</option>
                                    <option value="Perempuan" <?php echo e(old('jenis_kelamin') == 'Perempuan' ? 'selected' : ''); ?>>
                                        Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="agama" class="font-weight-bold text-primary">Agama</label>
                                <select name="agama" id="agama" class="form-control" required>
                                    <option value="">-- Pilih Agama --</option>
                                    <option value="Islam" <?php echo e(old('agama') == 'Islam' ? 'selected' : ''); ?>>Islam</option>
                                    <option value="Kristen" <?php echo e(old('agama') == 'Kristen' ? 'selected' : ''); ?>>Kristen
                                    </option>
                                    <option value="Katolik" <?php echo e(old('agama') == 'Katolik' ? 'selected' : ''); ?>>Katolik
                                    </option>
                                    <option value="Hindu" <?php echo e(old('agama') == 'Hindu' ? 'selected' : ''); ?>>Hindu</option>
                                    <option value="Buddha" <?php echo e(old('agama') == 'Buddha' ? 'selected' : ''); ?>>Buddha</option>
                                    <option value="Konghucu" <?php echo e(old('agama') == 'Konghucu' ? 'selected' : ''); ?>>Konghucu
                                    </option>
                                </select>
                            </div>

                        </div>

                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" name="pekerjaan" id="pekerjaan" class="form-control"
                                    placeholder="Masukkan Pekerjaan" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="telp">Nomor Telepon</label>
                                <input type="text" name="telp" id="telp" class="form-control"
                                    placeholder="Masukkan Nomor Telepon" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Masukkan Email Aktif" required>
                            </div>

                            
                            <div class="form-group mt-4 text-right">
                                <a href="<?php echo e(route('warga.index')); ?>" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/warga/create.blade.php ENDPATH**/ ?>