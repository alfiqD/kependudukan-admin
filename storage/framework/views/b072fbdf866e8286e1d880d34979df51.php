<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Data User</h1>

        
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <!-- Tombol Tambah Data -->
        <a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary mb-3 d-inline-flex align-items-center gap-1">
            <ion-icon name="add-circle-outline" class="me-1"></ion-icon>
            Tambah Data
        </a>


        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">

                    <form method="GET" action="<?php echo e(route('users.index')); ?>" class="d-flex justify-content-between mb-3">
                        
                        <div class="input-group input-group-sm" style="width: 260px;">
                            <input type="text" name="search" class="form-control" placeholder="Cari nama..."
                                value="<?php echo e(request('search')); ?>" style="height: 38px; border-radius: 5px;">
                            <button class="btn btn-outline-secondary" type="submit" style="height: 38px;">
                                <i class="bi bi-search fs-5"></i>
                            </button>

                            <?php if(request('search') || request('filter')): ?>
                                <a href="<?php echo e(route('users.index')); ?>" class="btn btn-outline-secondary"
                                    style="height: 38px;">
                                    <i class="bi bi-x-lg fs-5"></i>
                                </a>
                            <?php endif; ?>
                        </div>

                        
                        <select name="filter" class="form-select form-select-sm"
                            style="width: 150px; border-radius: 6px; background: #f8f9fa; color: #000;"
                            onchange="this.form.submit()">

                            <option value="">Filter Email</option>
                            <option value="gmail" <?php echo e(request('filter') == 'gmail' ? 'selected' : ''); ?>>Gmail</option>
                            <option value="yahoo" <?php echo e(request('filter') == 'yahoo' ? 'selected' : ''); ?>>Yahoo</option>
                            <option value="outlook" <?php echo e(request('filter') == 'outlook' ? 'selected' : ''); ?>>Outlook</option>
                            <option value="lainnya" <?php echo e(request('filter') == 'lainnya' ? 'selected' : ''); ?>>Lainnya</option>
                        </select>
                    </form>


                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Password (Hash)</th> 
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td>
                                        <?php if($user->role == 'admin'): ?>
                                            <span class="badge bg-primary">Admin</span>
                                        <?php elseif($user->role == 'petugas'): ?>
                                            <span class="badge bg-success">Petugas</span>
                                        <?php else: ?>
                                            <span class="badge bg-warning text-dark">Warga</span>
                                        <?php endif; ?>
                                    </td>

                                    
                                    <td style="max-width: 350px; word-break: break-all;">
                                        <small class="text-muted"><?php echo e($user->password); ?></small>
                                    </td>

                                    <td>
                                        <!-- Tombol Edit -->
                                        <a href="<?php echo e(route('users.edit', $user)); ?>"
                                            class="btn btn-warning btn-sm d-inline-flex align-items-center gap-1">
                                            <ion-icon name="create-outline" class="me-1"></ion-icon>
                                            Edit
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form action="<?php echo e(route('users.destroy', $user)); ?>" method="POST"
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


                            <?php if($users->isEmpty()): ?>
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada data user.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        <?php echo e($users->links('pagination::bootstrap-4')); ?>

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
                        text: "Data user yang dihapus tidak bisa dikembalikan!",
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

<?php echo $__env->make('layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/user/index.blade.php ENDPATH**/ ?>