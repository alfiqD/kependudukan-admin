<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data User</h1>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success d-none d-md-block">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <a href="<?php echo e(route('users.create')); ?>"
       class="btn btn-primary mb-3 d-inline-flex align-items-center gap-1">
        <ion-icon name="add-circle-outline"></ion-icon>
        Tambah Data
    </a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">

                
                <form method="GET"
                      action="<?php echo e(route('users.index')); ?>"
                      class="d-flex justify-content-between mb-3">

                    
                    <div class="input-group input-group-sm" style="width: 260px;">
                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Cari nama..."
                               value="<?php echo e(request('search')); ?>">
                        <button class="btn btn-outline-secondary">
                            <i class="bi bi-search"></i>
                        </button>

                        <?php if(request('search') || request('filter')): ?>
                            <a href="<?php echo e(route('users.index')); ?>"
                               class="btn btn-outline-secondary">
                                <i class="bi bi-x-lg"></i>
                            </a>
                        <?php endif; ?>
                    </div>

                    
                    <select name="filter"
                            class="form-select form-select-sm"
                            style="width: 150px;"
                            onchange="this.form.submit()">
                        <option value="">Filter Email</option>
                        <option value="gmail" <?php echo e(request('filter') == 'gmail' ? 'selected' : ''); ?>>Gmail</option>
                        <option value="yahoo" <?php echo e(request('filter') == 'yahoo' ? 'selected' : ''); ?>>Yahoo</option>
                        <option value="outlook" <?php echo e(request('filter') == 'outlook' ? 'selected' : ''); ?>>Outlook</option>
                        <option value="lainnya" <?php echo e(request('filter') == 'lainnya' ? 'selected' : ''); ?>>Lainnya</option>
                    </select>
                </form>

                
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th width="50">No</th>
                            <th width="90">Foto</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th width="120">Role</th>
                            <th>Password (Hash)</th>
                            <th width="170">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="text-center">
                                    <?php echo e(($users->currentPage() - 1) * $users->perPage() + $loop->iteration); ?>

                                </td>

                                
                                <td class="text-center">
                                    <?php if($user->profile_picture): ?>
                                        <img src="<?php echo e(asset('storage/' . $user->profile_picture)); ?>"
                                             alt="Foto"
                                             class="rounded-circle"
                                             width="45"
                                             height="45"
                                             style="object-fit: cover;">
                                    <?php else: ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>

                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>

                                <td class="text-center">
    <?php if($user->role === 'admin'): ?>
        <span class="badge bg-primary">Admin</span>

    <?php elseif($user->role === 'staff_desa'): ?>
        <span class="badge bg-success">Staff Desa</span>

    <?php elseif($user->role === 'kepala_desa'): ?>
        <span class="badge bg-dark">Kepala Desa</span>

    <?php else: ?>
        <span class="badge bg-secondary">Tidak Diketahui</span>
    <?php endif; ?>
</td>


                                <td style="max-width: 300px; word-break: break-all;">
                                    <small class="text-muted"><?php echo e($user->password); ?></small>
                                </td>

                                <td class="text-center">
                                    <a href="<?php echo e(route('users.edit', $user)); ?>"
                                       class="btn btn-warning btn-sm d-inline-flex align-items-center gap-1">
                                        <ion-icon name="create-outline"></ion-icon>
                                        Edit
                                    </a>

                                    <form action="<?php echo e(route('users.destroy', $user)); ?>"
                                          method="POST"
                                          class="d-inline delete-form">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="button"
                                                class="btn btn-danger btn-sm btn-delete d-inline-flex align-items-center gap-1">
                                            <ion-icon name="trash-outline"></ion-icon>
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted">
                                    Belum ada data user.
                                </td>
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
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('form');

            Swal.fire({
                title: 'Yakin hapus?',
                text: 'Data user yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
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
    title: 'Berhasil',
    text: '<?php echo e(session('success')); ?>',
    timer: 2000,
    showConfirmButton: false
});
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/user/index.blade.php ENDPATH**/ ?>