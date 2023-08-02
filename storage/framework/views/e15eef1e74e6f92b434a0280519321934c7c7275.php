
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Basic_Elements'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Biota <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Tambah Roles <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<!-- Start row -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Sizing</h4>
                <p class="card-title-desc">Set heights using classes like <code>.form-control-lg</code> and <code>.form-control-sm</code>.</p>
                
                <?php if($errors->any()): ?>
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><?php echo e($error); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <?php echo Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]); ?>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <?php echo Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')); ?>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br/>
                            <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label><?php echo e(Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name'))); ?>

                                <?php echo e($value->name); ?></label>
                            <br/>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="col-12 btn btn-primary">Submit</button>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\dashboardusea3\resources\views/roles/edit.blade.php ENDPATH**/ ?>