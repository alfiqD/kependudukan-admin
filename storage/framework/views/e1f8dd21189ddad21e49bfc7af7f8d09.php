<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Data Peristiwa Kematian</h1>

        
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <!-- Tombol Tambah Data -->
        <a href="<?php echo e(route('peristiwa_kematian.create')); ?>"
            class="btn btn-primary mb-3 d-inline-flex align-items-center gap-1">
            <ion-icon name="add-circle-outline"></ion-icon> Tambah Data
        </a>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Warga</th>
                                <th>Tanggal Meninggal</th>
                                <th>Sebab</th>
                                <th>Lokasi</th>
                                <th>No Surat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($data->firstItem() + $index); ?></td>
                                    <td><?php echo e($item->warga->nama ?? '-'); ?></td>
                                    <td><?php echo e($item->tgl_meninggal); ?></td>
                                    <td><?php echo e($item->sebab ?? '-'); ?></td>
                                    <td><?php echo e($item->lokasi ?? '-'); ?></td>
                                    <td><?php echo e($item->no_surat ?? '-'); ?></td>
                                    <td>
                                        <!-- Tombol Detail -->
                                        <a href="<?php echo e(route('peristiwa_kematian.show', $item->kematian_id)); ?>"
                                            class="btn btn-info btn-sm d-inline-flex align-items-center gap-1">
                                            <ion-icon name="eye-outline"></ion-icon> Detail
                                        </a>

                                        <!-- Tombol Edit -->
                                        <a href="<?php echo e(route('peristiwa_kematian.edit', $item->kematian_id)); ?>"
                                            class="btn btn-warning btn-sm d-inline-flex align-items-center gap-1">
                                            <ion-icon name="create-outline"></ion-icon> Edit
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form action="<?php echo e(route('peristiwa_kematian.destroy', $item->kematian_id)); ?>"
                                            method="POST" class="d-inline delete-form">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="button"
                                                class="btn btn-danger btn-sm btn-delete d-inline-flex align-items-center gap-1">
                                                <ion-icon name="trash-outline"></ion-icon> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="7" class="text-center">
                                        Belum ada data peristiwa kematian.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center mt-3">
                        <?php echo e($data->links('pagination::bootstrap-4')); ?>

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
                        title: 'Yakin hapus?',
                        text: "Data ini tidak dapat dikembalikan!",
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

<?php echo $__env->make('layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/peristiwa_kematian/index.blade.php ENDPATH**/ ?>