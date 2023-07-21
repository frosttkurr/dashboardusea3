
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Basic_Elements'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Laporan Nelayan <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Tambah Laporan Nelayan <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<!-- Start row -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <p class="card-title-desc">Laporkan data temuan biota pada form berikut:</p>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('dashboard.laporan-nelayan.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                    <div class="mb-4">
                        <label class="form-label">Lokasi</label>
                        <select name="id_lokasi" class="form-control">
                            <option selected="true" disabled="disabled">Pilih Lokasi Temuan</option>   
                            <?php $__currentLoopData = $lokasis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lokasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($lokasi->id); ?>"><?php echo e($lokasi->nama_lokasi); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Jenis Temuan</label>
                        <select name="id_jenis_temuan" class="form-control">
                            <option selected="true" disabled="disabled">Pilih Jenis Temuan</option>   
                            <?php $__currentLoopData = $jenisTemuans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenisTemuan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($jenisTemuan->id); ?>"><?php echo e($jenisTemuan->jenis_temuan); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="isi_laporan">Isi Laporan</label>
                        <textarea class="form-control" type="text" id="isi_laporan" name="isi_laporan" rows="4" placeholder="Jabarkan isi/keterangan laporan temuan biota"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="isi_laporan">Tanggal</label>
                        <?php echo Form::date('tanggal', \Carbon\Carbon::now(), ['class' => 'form-control']); ?>

                    </div>
    
                    <button type="submit" class="mt-1 btn btn-primary waves-effect waves-light">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\dashboardusea3\resources\views/laporan-nelayan/create.blade.php ENDPATH**/ ?>