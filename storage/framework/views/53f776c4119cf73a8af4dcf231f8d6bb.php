<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Profil Pengguna</h1>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?php echo e(session('success')); ?>

            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    <?php endif; ?>

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow mb-4">
                <div class="card-body">

                    <div class="row align-items-center">

                        
                        <div class="col-md-4 text-center mb-3 mb-md-0">
                            <img src="<?php echo e($user->avatar
        ? asset('storage/' . $user->avatar)
        : asset('images/default-avatar.png')); ?>"
     class="rounded-circle img-thumbnail"
     width="160"
     height="160"
     style="object-fit: cover;"
     alt="Avatar">


                            <h5 class="mt-3 mb-0 font-weight-bold">
                                <?php echo e($user->name); ?>

                            </h5>
                            <small class="text-muted text-capitalize">
                                <?php echo e($user->role); ?>

                            </small>
                        </div>

                        
                        <div class="col-md-8">
                            <table class="table table-borderless mb-3">
                                <tr>
                                    <th width="140">Nama</th>
                                    <td>: <?php echo e($user->name); ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>: <?php echo e($user->email); ?></td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>: <?php echo e(ucfirst($user->role)); ?></td>
                                </tr>
                            </table>

                            <div class="text-right">
                                <a href="<?php echo e(route('users.edit', $user)); ?>"
                                   class="btn btn-primary">
                                    <i class="fas fa-edit mr-1"></i>
                                    Edit Profil
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Alyah2SIB\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/profile/index.blade.php ENDPATH**/ ?>