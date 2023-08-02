
<?php $__env->startSection('title'); ?> Users  <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> U-Sea <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Users <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        <h4 class="card-title">Users</h4>
                        <p class="card-title-desc">Data users yang terdaftar</p>
                    </div>
                    <div class="col-2 text-right">
                        <a class="btn btn-primary" href="<?php echo e(route('admin.dashboard.users.create')); ?>">Tambah</a>
                    </div>
                </div>
                </div>
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                    <tr>
                        <th class="col-1">No.</th>
                        <th class="col-4">Nama</th>
                        <th class="col-4">Email</th>
                        <th class="col-2">Role</th>
                        <th class="col-1"></th>
                        <th class="col-2">Action</th>
                    </tr>
                    </thead>


                    <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td>
                                <?php if(count($user->roles) > 0): ?> 
                                    <?php echo e($user->roles[0]->name); ?> 
                                <?php else: ?> 
                                    -
                                <?php endif; ?>
                            </td>
                            <td>
                                <img src="<?php echo e(url('storage/'.$user->avatar)); ?>" width="50px" height="50px" alt="Avatar">
                            </td>
                            <td>
                                <a class="btn btn-primary" href="<?php echo e(route('admin.dashboard.users.edit',$user->id)); ?>">Edit</a>
                                <?php echo Form::open(['method' => 'DELETE','route' => ['admin.dashboard.users.destroy', $user->id],'style'=>'display:inline']); ?>

                                    <button onclick="return confirm ('Hapus data?')" type="submit" class="btn btn-danger waves-effect waves-light">Hapus</button>
                                <?php echo Form::close(); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\dashboardusea3\resources\views/users/index.blade.php ENDPATH**/ ?>