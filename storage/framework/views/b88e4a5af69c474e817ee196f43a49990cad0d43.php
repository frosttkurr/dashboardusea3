<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Basic_Elements'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Laporan Nelayan <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Ubah Laporan Nelayan <?php $__env->endSlot(); ?>
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
                <form action="<?php echo e(route('dashboard.laporan-nelayan.update', $laporanNelayan->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                    <div class="mb-4">
                        <label class="form-label">Lokasi</label>
                        <select name="id_lokasi" class="form-control">
                            <option></option>   
                            <?php $__currentLoopData = $lokasis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lokasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($lokasi->id); ?>" <?php if($lokasi->id == $laporanNelayan->id_lokasi): ?> selected <?php endif; ?>><?php echo e($lokasi->nama_lokasi); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Jenis Temuan</label>
                        <select name="id_jenis_temuan" class="form-control">
                            <option></option>   
                            <?php $__currentLoopData = $jenisTemuans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenisTemuan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($jenisTemuan->id); ?>" <?php if($jenisTemuan->id == $laporanNelayan->id_jenis_temuan): ?> selected <?php endif; ?>><?php echo e($jenisTemuan->jenis_temuan); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="isi_laporan">Isi Laporan</label>
                        <textarea class="form-control" type="text" id="isi_laporan" name="isi_laporan" rows="4" ><?php echo e($laporanNelayan->isi_laporan); ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="isi_laporan">Tanggal</label>
                        <input name="tanggal" id="tanggal" class="form-control" required="" value="<?php echo e($laporanNelayan->tanggal); ?>" type="date">
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\job\dashboardusea3\resources\views/laporan-nelayan/edit.blade.php ENDPATH**/ ?>