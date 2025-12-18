<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Data Kartu Keluarga</h1>

        
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <!-- Tombol Tambah Data -->
        <a href="<?php echo e(route('keluarga_kk.create')); ?>" class="btn btn-primary mb-3 d-inline-flex align-items-center gap-1">
            <ion-icon name="add-circle-outline" class="me-1"></ion-icon>
            Tambah Data
        </a>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">

                    <form method="GET" action="<?php echo e(route('keluarga_kk.index')); ?>"
                        class="d-flex flex-column flex-md-row justify-content-between mb-3 gap-2">

                        
                        <div class="input-group input-group-sm" style="width: 100%; max-width: 300px;">
                            
                            <?php if(request('rt')): ?>
                                <input type="hidden" name="rt" value="<?php echo e(request('rt')); ?>">
                            <?php endif; ?>
                            <?php if(request('rw')): ?>
                                <input type="hidden" name="rw" value="<?php echo e(request('rw')); ?>">
                            <?php endif; ?>

                            <input type="text" name="search" class="form-control"
                                placeholder="Cari No KK / Nama Kepala..." value="<?php echo e(request('search')); ?>"
                                style="height: 38px; border-radius: 5px 0 0 5px;">

                            <button class="btn btn-outline-secondary" type="submit" style="height: 38px;">
                                <i class="bi bi-search fs-5"></i>
                            </button>

                            <?php if(request('search') || request('rt') || request('rw')): ?>
                                <a href="<?php echo e(route('keluarga_kk.index')); ?>"
                                    class="btn btn-outline-secondary d-flex align-items-center" style="height: 38px;">
                                    <i class="bi bi-x-lg"></i>
                                </a>
                            <?php endif; ?>
                        </div>

                        
                        <div class="d-flex gap-2">
                            
                            <?php if(request('search')): ?>
                                <input type="hidden" name="search" value="<?php echo e(request('search')); ?>">
                            <?php endif; ?>

                            
                            <select name="rt" class="form-select form-select-sm"
                                style="width: 100px; height: 38px; border-radius: 6px; background: #f8f9fa;"
                                onchange="this.form.submit()">
                                <option value="">- RT -</option>
                                <option value="1" <?php echo e(request('rt') == '1' ? 'selected' : ''); ?>>1</option>
                                <option value="2" <?php echo e(request('rt') == '2' ? 'selected' : ''); ?>>2</option>
                                <option value="3" <?php echo e(request('rt') == '3' ? 'selected' : ''); ?>>3</option>
                                <option value="4" <?php echo e(request('rt') == '4' ? 'selected' : ''); ?>>4</option>
                            </select>

                            
                            <select name="rw" class="form-select form-select-sm"
                                style="width: 100px; height: 38px; border-radius: 6px; background: #f8f9fa;"
                                onchange="this.form.submit()">
                                <option value="">- RW -</option>
                                <option value="1" <?php echo e(request('rw') == '1' ? 'selected' : ''); ?>>1</option>
                                <option value="2" <?php echo e(request('rw') == '2' ? 'selected' : ''); ?>>2</option>
                                <option value="3" <?php echo e(request('rt') == '3' ? 'selected' : ''); ?>>3</option>
                                <option value="4" <?php echo e(request('rt') == '4' ? 'selected' : ''); ?>>4</option>
                            </select>
                        </div>
                    </form>

                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Nomor KK</th>
                                <th>Kepala Keluarga</th>
                                <th>Alamat</th>
                                <th>RT</th>
                                <th>RW</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $keluarga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td> 
                                    <td><?php echo e($data->kk_nomor); ?></td>
                                    <td><?php echo e($data->kepalaKeluarga->nama ?? '-'); ?></td>
                                    <td><?php echo e($data->alamat); ?></td>
                                    <td><?php echo e($data->rt); ?></td>
                                    <td><?php echo e($data->rw); ?></td>
                                    <!-- Tombol Edit & Hapus di tabel -->
                                    <td>
                                        <!-- Tombol Edit -->
                                        <a href="<?php echo e(route('keluarga_kk.edit', $data)); ?>"
                                            class="btn btn-warning btn-sm d-inline-flex align-items-center gap-1">
                                            <ion-icon name="create-outline" class="me-1"></ion-icon>
                                            Edit
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form action="<?php echo e(route('keluarga_kk.destroy', $data)); ?>" method="POST"
                                            class="d-inline delete-form">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="button"
                                                class="btn btn-danger btn-sm btn-delete d-inline-flex align-items-center gap-1">
                                                <ion-icon name="trash-outline" class="me-1"></ion-icon>
                                                Hapus
                                            </button>
                                        </form>
                                    </td>


                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        <?php echo e($keluarga->links('pagination::bootstrap-4')); ?>

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
                        showClass: {
                            popup: 'animate__animated animate__zoomIn'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOut'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // baru kirim form kalau user klik "Ya, hapus!"
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
                    showClass: {
                        popup: 'animate__animated animate__zoomIn'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOut'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // baru kirim form kalau user klik "Ya, hapus!"
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

<?php echo $__env->make('layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/keluarga/index.blade.php ENDPATH**/ ?>