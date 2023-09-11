
<?php $__env->startSection('title'); ?> Track Detail <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Track <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Data Track Detail <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        <h4 class="card-title">Track: <?php echo e(date('d-M-Y', strtotime($track->tanggal))); ?></h4>
                        <p class="card-title-desc">Detail track biota yang tercatat</p>
                    </div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('track')): ?>
                    <div class="col-2 text-right">
                        <a href="<?php echo e(route('admin.dashboard.track.detail.create', $track->id)); ?>"><button type="button" class="mt-1 btn btn-primary waves-effect waves-light">Tambah Data</button></a>
                    </div>
                    <?php endif; ?>
                </div>
                </div>
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                    <tr>
                        <th class="col-1">No.</th>
                        <th class="col-2">Biota</th>
                        <th class="col-2">Lokasi</th>
                        <th class="col-3">Gambar</th>
                        <th class="col-3">Keterangan</th>
                        <th class="col-2">Action</th>
                    </tr>
                    </thead>


                    <tbody>
                    <?php $__currentLoopData = $trackDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($key+1); ?></td>
                        <td><?php echo e($detail->biota->nama_biota); ?>  <?php if($detail->biota->status == 1): ?> <span class="badge badge-success">Aktif</span> <?php elseif($detail->biota->status == 0): ?> <span class="badge badge-danger">Non-Aktif</span> <?php endif; ?></td>
                        <td><?php echo e($detail->lokasi->nama_lokasi); ?></td>
                        <td>
                            <img src="<?php echo e(url('storage/'.$detail->image)); ?>" alt="Gambar biota" width="200px">
                        </td>
                        <td><?php echo e($detail->keterangan); ?></td>
                        <td>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('track')): ?>
                                <a href="<?php echo e(route('admin.dashboard.track.detail.edit', [$track->id, $detail->id])); ?>"><button type="button" class="mt-1 btn btn-warning waves-effect waves-light">Edit</button></a>
                                <a href="<?php echo e(route('admin.dashboard.track.detail.destroy',[$track->id, $detail->id])); ?>" onclick="notificationBeforeDelete(event, this)">
                                    <button type="button" class="mt-1 btn btn-danger waves-effect waves-light">Hapus</button>
                                </a>
                            <?php endif; ?>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\dashboardusea3\resources\views/track/detail/index.blade.php ENDPATH**/ ?>