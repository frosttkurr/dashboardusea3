<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Basic_Elements'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Kondisi Perairan  <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Tambah Kondisi Perairan <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<!-- Start row -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Sizing</h4>
                <p class="card-title-desc">Set heights using classes like <code>.form-control-lg</code> and <code>.form-control-sm</code>.</p>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('dashboard.kondisi-perairan.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                    <div class="mb-4">
                        <label class="form-label" for="isi_laporan">Tanggal</label>
                        <?php echo Form::date('tanggal', \Carbon\Carbon::now(), ['class' => 'form-control']); ?>

                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label">Lokasi</label>
                        <select name="id_lokasi" class="form-control">
                            <option></option>   
                            <?php $__currentLoopData = $lokasis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lokasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($lokasi->id); ?>"><?php echo e($lokasi->nama_lokasi); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="kondisi">Kondisi</label>
                        <input class="form-control" type="text" id="kondisi" name="kondisi">
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="uraian">Uraian</label>
                        <textarea class="form-control" type="text" id="uraian" name="uraian" rows="4" ></textarea>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\job\dashboardusea3\resources\views/kondisi-perairan/create.blade.php ENDPATH**/ ?>