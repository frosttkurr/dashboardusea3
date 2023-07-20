<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Basic_Elements'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('/assets/libs/dropzone/dropzone.min.css')); ?>" rel="stylesheet">
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Biota <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Tambah Biota <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<!-- Start row -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Silahkan tambah spesies biota disini.</h4>
                <p class="card-title-desc">Harap isi semua data dengan lengkap agar informasi yang diberikan sesuai.</p>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('dashboard.biota.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                    <div class="mb-4">
                        <label class="form-label" for="biota">Biota</label>
                        <input class="form-control" type="text" id="biota" name="nama_biota" placeholder="Nama Biota">
                    </div>
                    <div class="mb-4">
                        <!-- <label for="choices-single-default" class="form-label font-size-13 text-muted">Default</label> -->
                            <label class="form-label" for="biota">Jenis Biota</label>
                                <select class="form-control" data-trigger name="id_jenis_biota"
                                    id="choices-single-default"
                                    placeholder="Cari jenis biota">
                                    <option value="">Pilih jenis biota</option>
                                    <?php $__currentLoopData = $jenisBiotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenisBiota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <option value="<?php echo e($jenisBiota->id); ?>"><?php echo e($jenisBiota->jenis_biota); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- <option value="Choice 2">Choice 2</option>
                                    <option value="Choice 3">Choice 3</option> -->
                                </select>
                        <!-- <label class="form-label" for="biota">Jenis Biota</label>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                $jenisBiota <i class="mdi mdi-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
                                <?php $__currentLoopData = $jenisBiotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenisBiota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="dropdown-item" href="#"><?php echo e($jenisBiota->jenis_biota); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div> -->
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="biota">Deskripsi</label>
                        <input class="form-control" type="text" id="deskripsi" name="deskripsi" placeholder="Deskripsi">
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Gambar</h4>
                            <p class="card-title-desc">Silahkan upload file gambar dari biota disini.
                            </p>
                        </div>
                        <div class="card-body">

                            <div>
                                    <div class="fallback">
                                        <input name="image" type="file">
                                    </div>
                            </div>
                        </div>
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
<script src="<?php echo e(URL::asset('/assets/libs/dropzone/dropzone.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\job\dashboardusea3\resources\views/biota/create.blade.php ENDPATH**/ ?>