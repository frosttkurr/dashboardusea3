<?php $__env->startSection('title'); ?> Kondisi Perairan  <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> U-Sea <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Kondisi Perairan <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        <h4 class="card-title">Kondisi Perairan</h4>
                        <p class="card-title-desc">Ini Kondisi Perairan</p>
                    </div>
                    
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('kondisi-perairan')): ?>
                    <div class="col-2 text-right">
                        <a href="kondisi-perairan/create"><button type="button" class="mt-1 btn btn-primary waves-effect waves-light">Tambah Data</button></a>
                    </div>
                        <?php endif; ?>
                </div>
                </div>
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                    <tr>
                        <th class="col-2">Tanggal</th>
                        <th class="col-2">Lokasi</th>
                        <th class="col-2">Kondisi</th>
                        <th class="col-4">Uraian</th>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lihat-kondisi-perairan')): ?>
                        <th class="col-2">Action</th>
                        <?php endif; ?>
                    </tr>
                    </thead>


                    <tbody>
                    <?php $__currentLoopData = $kondisiPerairans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kondisi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($kondisi->tanggal); ?></td>
                        <td><?php echo e($kondisi->lokasi->nama_lokasi); ?></td>
                        <td><?php echo e($kondisi->kondisi); ?></td>
                        <td><?php echo e($kondisi->uraian); ?></td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('kondisi-perairan')): ?>
                        <td>
                            <a href="kondisi-perairan/edit/<?php echo e($kondisi->id); ?>"><button type="button" class="mt-1 btn btn-warning waves-effect waves-light">Edit</button></a>
                            <a onclick="return confirm ('Hapus data?')" href="kondisi-perairan/destroy/<?php echo e($kondisi->id); ?>"><button type="button" class="mt-1 btn btn-danger waves-effect waves-light">Hapus</button></a>
                        </td>
                        <?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\job\dashboardusea3\resources\views/kondisi-perairan/index.blade.php ENDPATH**/ ?>