<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Data Anggota Keluarga</h1>

        
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <!-- Tombol Tambah Data -->
        <a href="<?php echo e(route('anggota_keluarga.create')); ?>" class="btn btn-primary mb-3 d-inline-flex align-items-center gap-1">
            <ion-icon name="add-circle-outline" class="me-1"></ion-icon>
            Tambah Data
        </a>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">

                    <form method="GET" action="<?php echo e(route('anggota_keluarga.index')); ?>"
                        class="d-flex flex-column flex-md-row justify-content-between mb-3 gap-2">

                        
                        <div class="input-group input-group-sm" style="width:100%; max-width:260px;">
                            
                            <?php if(request('hubungan')): ?>
                                <input type="hidden" name="hubungan" value="<?php echo e(request('hubungan')); ?>">
                            <?php endif; ?>

                            <input type="text" name="search" class="form-control" placeholder="Cari ID Anggota..."
                                value="<?php echo e(request('search')); ?>" style="height:38px; border-radius:5px 0 0 5px;">

                            <button class="btn btn-outline-secondary" type="submit" style="height:38px;">
                                <i class="bi bi-search fs-6"></i>
                            </button>

                            <?php if(request('search') || request('hubungan')): ?>
                                <a href="<?php echo e(route('anggota_keluarga.index')); ?>"
                                    class="btn btn-outline-secondary d-flex align-items-center" style="height:38px;">
                                    <i class="bi bi-x-lg"></i>
                                </a>
                            <?php endif; ?>
                        </div>

                        
                        <div class="d-flex gap-2">
                            
                            <?php if(request('search')): ?>
                                <input type="hidden" name="search" value="<?php echo e(request('search')); ?>">
                            <?php endif; ?>

                            <select name="hubungan" class="form-select form-select-sm"
                                style="width: 150px; height:38px; border-radius:6px; background:#f8f9fa;"
                                onchange="this.form.submit()">

                                <option value="">- Hubungan -</option>
                                <option value="Kepala Keluarga" <?php echo e(request('hubungan') == 'Kepala Keluarga' ? 'selected' : ''); ?>>
                                    Kepala Keluarga</option>
                                <option value="Istri" <?php echo e(request('hubungan') == 'Istri' ? 'selected' : ''); ?>>Istri</option>
                                <option value="Anak" <?php echo e(request('hubungan') == 'Anak' ? 'selected' : ''); ?>>Anak</option>
                                <option value="Lainnya" <?php echo e(request('hubungan') == 'Lainnya' ? 'selected' : ''); ?>>Lainnya</option>
                            </select>
                        </div>

                    </form>



                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Anggota ID</th>
                                <th>KK ID</th>
                                <th>Warga ID</th>
                                <th>Hubungan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>

                                    
                                    <td><?php echo e($data->anggota_id); ?></td>
                                    <td><?php echo e($data->kk_id); ?></td>
                                    <td><?php echo e($data->warga_id); ?></td>
                                    <td><?php echo e($data->hubungan); ?></td>

                                    <td>
                                        <div style="display: inline-flex; align-items: center; gap: 3px;">
                                            <a href="<?php echo e(route('anggota_keluarga.edit', $data->anggota_id)); ?>"
                                                class="btn btn-warning btn-sm d-flex align-items-center gap-1">
                                                <ion-icon name="create-outline"></ion-icon>
                                                Edit
                                            </a>

                                            <form action="<?php echo e(route('anggota_keluarga.destroy', $data->anggota_id)); ?>"
                                                method="POST" style="margin: 0; padding: 0;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="button"
                                                    class="btn btn-danger btn-sm d-flex align-items-center gap-1 btn-delete">
                                                    <ion-icon name="trash-outline"></ion-icon>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>


                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        <?php echo e($anggota->links('pagination::bootstrap-4')); ?>

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
                        title: 'Apakah kamu yakin?',
                        text: "Data yang dihapus tidak bisa dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

    <?php if(session('success')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?php echo e(session('success')); ?>',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/anggota_keluarga/index.blade.php ENDPATH**/ ?>