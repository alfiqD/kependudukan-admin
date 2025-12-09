<!-- resources/views/profile/index.blade.php -->


<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Profil Pengguna</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="card shadow mb-4 p-4">
        <div class="row">
            <div class="col-md-3 text-center">
                <img src="<?php echo e(asset('storage/profile/' . ($user->foto ?? 'default.png'))); ?>"
                     class="img-fluid rounded-circle mb-3" width="150" alt="Foto Profil">
            </div>

            <div class="col-md-9">
                <table class="table table-borderless">
                    <tr>
                        <th>Nama</th>
                        <td>: <?php echo e($user->name); ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>: <?php echo e($user->email); ?></td>
                    </tr>
                </table>

                <a href="<?php echo e(route('profile.edit', $user->id)); ?>" class="btn btn-primary mt-3">
                    Edit Profil
                </a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/profile/index.blade.php ENDPATH**/ ?>