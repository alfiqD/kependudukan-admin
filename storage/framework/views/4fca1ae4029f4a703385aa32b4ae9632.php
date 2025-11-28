<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Data Warga</h1>

        
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <a href="<?php echo e(route('warga.create')); ?>" class="btn btn-primary mb-3 d-inline-flex align-items-center gap-1">
            <ion-icon name="add-circle-outline" class="me-1"></ion-icon>
            Tambah Data
        </a>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">

                    <form method="GET" action="<?php echo e(route('warga.index')); ?>" class="d-flex justify-content-between mb-3">
                        
                        <div class="input-group input-group-sm" style="width: 260px;">
                            <input type="text" name="search" class="form-control" placeholder="Cari nama..."
                                value="<?php echo e(request('search')); ?>" style="height: 38px; border-radius: 5px;">
                            <button class="btn btn-outline-secondary" type="submit" style="height: 38px;">
                                <i class="bi bi-search fs-5"></i>
                            </button>
                            <?php if(request('search') || request('filter')): ?>
                                <a href="<?php echo e(route('warga.index')); ?>" class="btn btn-outline-secondary"
                                    style="height: 38px;">
                                    <i class="bi bi-x-lg fs-5"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                        
                        <select name="jenis_kelamin" class="form-select form-select-sm"
                            style="width: 150px; border-radius: 6px; background: #f8f9fa; color: #000;"
                            onchange="this.form.submit()">
                            <option value="">All</option>
                            <option value="Laki-laki" <?php echo e(request('jenis_kelamin') == 'Laki-laki' ? 'selected' : ''); ?>>
                                Laki-laki
                            </option>
                            <option value="Perempuan" <?php echo e(request('jenis_kelamin') == 'Perempuan' ? 'selected' : ''); ?>>
                                Perempuan
                            </option>
                        </select>
                    </form>

                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>No KTP</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Pekerjaan</th>
                                <th>Telp</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $warga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td> 
                                    <td><?php echo e($data->no_ktp); ?></td>
                                    <td><?php echo e($data->nama); ?></td>
                                    <td>
                                        <?php if($data->jenis_kelamin == 'Laki-laki'): ?>
                                            Laki-laki
                                        <?php elseif($data->jenis_kelamin == 'Perempuan'): ?>
                                            Perempuan
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($data->agama); ?></td>
                                    <td><?php echo e($data->pekerjaan); ?></td>
                                    <td><?php echo e($data->telp); ?></td>
                                    <td><?php echo e($data->email); ?></td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <a href="<?php echo e(route('warga.edit', $data)); ?>"
                                            class="btn btn-warning btn-sm d-inline-flex align-items-center gap-1">
                                            <ion-icon name="create-outline" class="me-1"></ion-icon>
                                            Edit
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form action="<?php echo e(route('warga.destroy', $data)); ?>" method="POST"
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

                            <?php if($warga->isEmpty()): ?>
                                <tr>
                                    <td colspan="9" class="text-center">Belum ada data warga.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        <?php echo e($warga->links('pagination::bootstrap-4')); ?>

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

<?php echo $__env->make('layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/warga/index.blade.php ENDPATH**/ ?>