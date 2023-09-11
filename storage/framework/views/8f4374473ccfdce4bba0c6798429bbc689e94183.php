
<?php $__env->startSection('title'); ?> Biota  <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> U-Sea <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Biota <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        <h4 class="card-title">Biota</h4>
                        <p class="card-title-desc">Data biota yang tersedia</p>
                    </div>
                    <div class="col-2 text-right">
                        <a href="<?php echo e(route('admin.dashboard.biota.create')); ?>"><button type="button" class="mt-1 btn btn-primary waves-effect waves-light">Tambah Data</button></a>
                    </div>
                </div>
                </div>
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                    <tr>
                        <th class="col-1"> No.</th>
                        <th class="col-2"> Biota</th>
                        <th class="col-2"> Jenis</th>
                        <th class="col-3"> Deskripsi</th>
                        <th class="col-2"> Gambar</th>
                        <th class="col-1"> Status</th>
                        <th class="col-1">Action</th>
                    </tr>
                    </thead>


                    <tbody>
                    <?php $__currentLoopData = $biotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $biota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($key+1); ?></td>
                        <td><?php echo e($biota->nama_biota); ?></td>
                        <td>
                            <?php if($biota->jenisBiota): ?>
                                <?php echo e($biota->jenisBiota['jenis_biota']); ?>

                            <?php else: ?>
                            -
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php echo e($biota->deskripsi); ?>

                        <td>
                            <img src="<?php echo e(url('storage/'.$biota->image)); ?>" width="100px" height="100px" alt="Gambar Biota">
                        </td>
                        <td><?php if($biota->status == 1): ?> <span class="badge badge-success">Aktif</span> <?php elseif($biota->status == 0): ?> <span class="badge badge-danger">Non-Aktif</span> <?php endif; ?></td>
                        <td>
                            <a href="<?php echo e(route('admin.dashboard.biota.edit', $biota->id)); ?>"><button type="button" class="mt-1 btn btn-warning waves-effect waves-light">Edit</button></a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('assets/libs/datatables.net/datatables.net.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/libs/datatables.net-buttons/datatables.net-buttons.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/libs/jszip/jszip.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/libs/pdfmake/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/libs/datatables.net-responsive/datatables.net-responsive.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/pages/datatables.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/app.min.js')); ?>"></script>

<form action="" id="delete-form" method="post">
    <?php echo method_field('delete'); ?>
    <?php echo csrf_field(); ?>
</form>

<script>
    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        Swal.fire({
            title: 'Yakin hapus data?',
            text: 'Data akan dihapus',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Hapus',                
        }).then((result) => {
            if (result.value) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        })
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\dashboardusea3\resources\views/biota/index.blade.php ENDPATH**/ ?>