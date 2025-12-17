<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Edit Data User</h1>

    <div class="card shadow mb-4">
        <div class="card-body">

            <form action="<?php echo e(route('users.update', $user->id)); ?>"
      method="POST"
      enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control"
                       value="<?php echo e(old('name', $user->name)); ?>" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="password"
                       class="form-control"
                       placeholder="Kosongkan jika tidak diubah">
            </div>
        </div>
    </div>

    
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email"
                       class="form-control"
                       value="<?php echo e(old('email', $user->email)); ?>" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                       class="form-control"
                       placeholder="Ulangi password">
            </div>
        </div>
    </div>

    
    <div class="row mt-3">
        
        <div class="col-md-6">
            <div class="form-group">
                <label>Avatar</label>
<input type="file" name="avatar"
       class="form-control" accept="image/*">

                <?php if($user->profile_picture): ?>
                    <div class="mt-2">
    <small>Avatar saat ini:</small><br>
    <img src="<?php echo e($user->avatar_url); ?>"
         class="rounded-circle border"
         width="120"
         height="120"
         style="object-fit: cover;">
</div>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="col-md-6">
            <div class="form-group">
    <label class="font-weight-bold text-primary">Role</label>
    <select name="role" class="form-control" required>
        <option value="admin" <?php echo e($user->role === 'admin' ? 'selected' : ''); ?>>
            Admin
        </option>

        <option value="staff_desa" <?php echo e($user->role === 'staff_desa' ? 'selected' : ''); ?>>
            Staff Desa
        </option>

        <option value="kepala_desa" <?php echo e($user->role === 'kepala_desa' ? 'selected' : ''); ?>>
            Kepala Desa
        </option>
    </select>

    <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <small class="text-danger"><?php echo e($message); ?></small>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

        </div>
    </div>

    
    <div class="text-end mt-4">
        <a href="<?php echo e(route('users.index')); ?>" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>


        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/user/edit.blade.php ENDPATH**/ ?>