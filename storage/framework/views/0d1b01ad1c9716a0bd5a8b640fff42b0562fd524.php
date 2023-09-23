
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Dashboards'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<link href="<?php echo e(URL::asset('/assets/libs/admin-resources/admin-resources.min.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Dashboard <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Selamat datang <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Unduh Data Report</span>
                        <h4 class="mb-3">
                            <div class="container mt-5">
                                <a href="<?php echo e(route('admin.dashboard.export.excel')); ?>" target="_blank" class="excel-link">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Microsoft_Excel_2013-2019_logo.svg/2170px-Microsoft_Excel_2013-2019_logo.svg.png" alt="Excel Logo" class="excel-logo" height="50px">
                                </a>
                            </div>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Biota Tercatat</span>
                        <h4 class="mb-3">
                            <span><?php echo e($count_biotas); ?></span>
                        </h4>
                        
                    </div>

                    <div class="flex-shrink-0 text-end dash-widget">
                        <div id="mini-chart1" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Hasil Tracker</span>
                        <h4 class="mb-3">
                            <span><?php echo e($count_tracks); ?></span>
                        </h4>
                        
                    </div>
                    <div class="flex-shrink-0 text-end dash-widget">
                        <div id="mini-chart2" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col-->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Laporan Nelayan Masuk</span>
                        <h4 class="mb-3">
                            <span><?php echo e($count_laporan_nelayans); ?></span>
                        </h4>
                        
                    </div>
                    <div class="flex-shrink-0 text-end dash-widget">
                        <div id="mini-chart3" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div>

<div class="row">
    <div class="col-xl-12">
        <!-- card -->
        <div class="card">
            <!-- card body -->
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-center mb-4">
                    <h5 class="card-title me-2">Mapping Tracks (SIG)</h5>
                    
                </div>

                <div class="row align-items-center">
                    <div id="map" style="height: 400px;"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row-->
</div>
<!-- end row-->

<div class="row">
    <div class="col-xl-3">
        <!-- <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Customer List</h4>
                <div class="flex-shrink-0">
                    <div class="dropdown">
                        <a class=" dropdown-toggle" href="#" id="dropdownMenuButton2"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted">All Members<i class="mdi mdi-chevron-down ms-1"></i></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                            <a class="dropdown-item" href="#">Members</a>
                            <a class="dropdown-item" href="#">New Members</a>
                            <a class="dropdown-item" href="#">Old Members</a>
                        </div>
                    </div>
                </div>
            </div>end card header -->

            <!-- <div class="card-body px-0">
                <div class="px-3" data-simplebar style="max-height: 386px;">
                    <div class="d-flex align-items-center pb-4">
                        <div class="avatar-md me-4">
                            <img src="<?php echo e(URL::asset('./assets/images/users/avatar-2.jpg')); ?>" class="img-fluid rounded-circle" alt="">
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="font-size-15 mb-1"><a href="" class="text-dark">Randy Matthews</a></h5>
                            <span class="text-muted">Randy@gmail.com</span>
                        </div>
                        <div class="flex-shrink-0 text-end">
                            <div class="dropdown align-self-start">
                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded font-size-24 text-dark"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Copy</a>
                                    <a class="dropdown-item" href="#">Save</a>
                                    <a class="dropdown-item" href="#">Forward</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center pb-4">
                        <div class="avatar-md me-4">
                            <img src="<?php echo e(URL::asset('./assets/images/users/avatar-4.jpg')); ?>" class="img-fluid rounded-circle" alt="">
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="font-size-15 mb-1"><a href="" class="text-dark">Vernon Wood</a></h5>
                            <span class="text-muted">Vernon@gmail.com</span>
                        </div>
                        <div class="flex-shrink-0 text-end">
                            <div class="dropdown align-self-start">
                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded font-size-24 text-dark"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Copy</a>
                                    <a class="dropdown-item" href="#">Save</a>
                                    <a class="dropdown-item" href="#">Forward</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center pb-4">
                        <div class="avatar-md me-4">
                            <img src="<?php echo e(URL::asset('./assets/images/users/avatar-5.jpg')); ?>" class="img-fluid rounded-circle" alt="">
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="font-size-15 mb-1"><a href="" class="text-dark">Howard Rhoades</a></h5>
                            <span class="text-muted">Howard@gmail.com</span>
                        </div>
                        <div class="flex-shrink-0 text-end">
                            <div class="dropdown align-self-start">
                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded font-size-24 text-dark"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Copy</a>
                                    <a class="dropdown-item" href="#">Save</a>
                                    <a class="dropdown-item" href="#">Forward</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center pb-4">
                        <div class="avatar-md me-4">
                            <img src="<?php echo e(URL::asset('./assets/images/users/avatar-6.jpg')); ?>" class="img-fluid rounded-circle" alt="">
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="font-size-15 mb-1"><a href="" class="text-dark">Arthur Zurcher</a></h5>
                            <span class="text-muted">Arthur@gmail.com</span>
                        </div>
                        <div class="flex-shrink-0 text-end">
                            <div class="dropdown align-self-start">
                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded font-size-24 text-dark"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Copy</a>
                                    <a class="dropdown-item" href="#">Save</a>
                                    <a class="dropdown-item" href="#">Forward</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center pb-4">
                        <div class="avatar-md me-4">
                            <img src="<?php echo e(URL::asset('./assets/images/users/avatar-8.jpg')); ?>" class="img-fluid rounded-circle" alt="">
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="font-size-15 mb-1"><a href="" class="text-dark">Angela Palmer</a></h5>
                            <span class="text-muted">Angela@gmail.com</span>
                        </div>
                        <div class="flex-shrink-0 text-end">
                            <div class="dropdown align-self-start">
                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded font-size-24 text-dark"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Copy</a>
                                    <a class="dropdown-item" href="#">Save</a>
                                    <a class="dropdown-item" href="#">Forward</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center pb-3">
                        <div class="avatar-md me-4">
                            <img src="<?php echo e(URL::asset('./assets/images/users/avatar-9.jpg')); ?>" class="img-fluid rounded-circle" alt="">
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="font-size-15 mb-1"><a href="" class="text-dark">Dorothy Wimson</a></h5>
                            <span class="text-muted">Dorothy@gmail.com</span>
                        </div>
                        <div class="flex-shrink-0 text-end">
                            <div class="dropdown align-self-start">
                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded font-size-24 text-dark"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Copy</a>
                                    <a class="dropdown-item" href="#">Save</a>
                                    <a class="dropdown-item" href="#">Forward</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->

    <div class="col-xl-5">
        <!-- <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Selling Products</h4>
                <div class="flex-shrink-0">
                    <div class="dropdown align-self-start">
                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-horizontal-rounded font-size-18 text-dark"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Copy</a>
                            <a class="dropdown-item" href="#">Save</a>
                            <a class="dropdown-item" href="#">Forward</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>
                </div>

            </div>end card header -->

            <!-- <div class="card-body px-0 pt-2 ">
                    <div class="table-responsive border-0 px-3" data-simplebar style="max-height: 395px;">
                        <table class="table align-middle table-nowrap ">
                            <tbody>
                                <tr>
                                    <td style="width: 50px;">
                                        <div class="avatar-md me-4">
                                            <img src="<?php echo e(URL::asset('./assets/images/product/img-1.png')); ?>" class="img-fluid" alt="">
                                        </div>
                                    </td>

                                    <td>
                                        <div>
                                            <h5 class="font-size-15"><a href="" class="text-dark">Half sleeve T-shirt</a></h5>
                                            <span class="text-muted">$240.00</span>
                                        </div>
                                    </td>

                                    <td>
                                        <p class="mb-1"><a href="" class="text-dark">Available</a></p>
                                        <span class="text-muted">243K</span>
                                    </td>

                                    <td>
                                        <div class="text-end">
                                            <ul class="mb-1 ps-0">
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bxs-star text-warning"></li>
                                            </ul>
                                            <span class="text-muted mt-1">145 Sales</span>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width: 50px;">
                                        <div class="avatar-md me-4">
                                            <img src="<?php echo e(URL::asset('./assets/images/product/img-2.png')); ?>" class="img-fluid" alt="">
                                        </div>
                                    </td>

                                    <td>
                                        <div>
                                            <h5 class="font-size-15"><a href="" class="text-dark">Light blue T-shirt</a></h5>
                                            <span class="text-muted">$650.00</span>
                                        </div>
                                    </td>

                                    <td>
                                        <p class="mb-1"><a href="" class="text-dark">Out Of Stock</a></p>
                                        <span class="text-muted">1,253K</span>
                                    </td>

                                    <td>
                                        <div class="text-end">
                                            <ul class="mb-1 ps-0">
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bx-star text-warning"></li>
                                            </ul>
                                            <span class="text-muted mt-1">260 Sales</span>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width: 50px;">
                                        <div class="avatar-md me-4">
                                            <img src="<?php echo e(URL::asset('./assets/images/product/img-3.png')); ?>" class="img-fluid" alt="">
                                        </div>
                                    </td>

                                    <td>
                                        <div>
                                            <h5 class="font-size-15"><a href="" class="text-dark">Black Color T-shirt</a></h5>
                                            <span class="text-muted">$325.00</span>
                                        </div>
                                    </td>

                                    <td>
                                        <p class="mb-1"><a href="" class="text-dark">Available</a></p>
                                        <span class="text-muted">2,586K</span>
                                    </td>

                                    <td>
                                        <div class="text-end">
                                            <ul class="mb-1 ps-0">
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bxs-star text-warning"></li>
                                            </ul>
                                            <span class="text-muted mt-1">220 Sales</span>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width: 50px;">
                                        <div class="avatar-md me-4">
                                            <img src="<?php echo e(URL::asset('./assets/images/product/img-4.png')); ?>" class="img-fluid" alt="">
                                        </div>
                                    </td>

                                    <td>
                                        <div>
                                            <h5 class="font-size-15"><a href="" class="text-dark"></a>Hoodie (Blue)</h5>
                                            <span class="text-muted">$170.00</span>
                                        </div>
                                    </td>

                                    <td>
                                        <p class="mb-1"><a href="" class="text-dark">Available</a></p>
                                        <span class="text-muted">4,565K</span>
                                    </td>

                                    <td>
                                        <div class="text-end">
                                            <ul class="mb-1 ps-0">
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bxs-star text-warning"></li>
                                            </ul>
                                            <span class="text-muted mt-1">165 Sales</span>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width: 50px;">
                                        <div class="avatar-md me-4">
                                            <img src="<?php echo e(URL::asset('./assets/images/product/img-5.png')); ?>" class="img-fluid" alt="">
                                        </div>
                                    </td>

                                    <td>
                                        <div>
                                            <h5 class="font-size-15"><a href="" class="text-dark"></a>Half sleeve T-Shirt</h5>
                                            <span class="text-muted">$150.00</span>
                                        </div>
                                    </td>

                                    <td>
                                        <p class="mb-1"><a href="" class="text-dark">Out Of Stock</a></p>
                                        <span class="text-muted">5,265K</span>
                                    </td>

                                    <td>
                                        <div class="text-end">
                                            <ul class="mb-1 ps-0">
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bx-star text-warning"></li>
                                            </ul>
                                            <span class="text-muted mt-1">165 Sales</span>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width: 50px;">
                                        <div class="avatar-md me-4">
                                            <img src="<?php echo e(URL::asset('./assets/images/product/img-6.png')); ?>" class="img-fluid" alt="">
                                        </div>
                                    </td>

                                    <td>
                                        <div>
                                            <h5 class="font-size-15"><a href="" class="text-dark"></a>Green color T-shirt</h5>
                                            <span class="text-muted">$120.00</span>
                                        </div>
                                    </td>

                                    <td>
                                        <p class="mb-1"><a href="" class="text-dark">Available</a></p>
                                        <span class="text-muted">125K</span>
                                    </td>

                                    <td>
                                        <div class="text-end">
                                            <ul class="mb-1 ps-0">
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bxs-star text-warning"></li>
                                                <li class="bx bx-star text-warning"></li>
                                            </ul>
                                            <span class="text-muted mt-1">165 Sales</span>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
            </div> -->
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->

    <div class="col-xl-4">
        <!-- <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Chat</h4>
                <div class="flex-shrink-0">
                    <select class="form-select form-select-sm mb-0 my-n1">
                        <option value="Today" selected="">Today</option>
                        <option value="Yesterday">Yesterday</option>
                        <option value="Week">Last Week</option>
                        <option value="Month">Last Month</option>
                    </select>
                </div>
            </div>end card header -->

            <!-- <div class="card-body px-0">
                <div class="px-3 chat-conversation" data-simplebar style="max-height: 350px;">
                    <ul class="list-unstyled mb-0">
                        <li class="chat-day-title">
                            <span class="title">Today</span>
                        </li>
                        <li>
                            <div class="conversation-list">
                                <div class="d-flex">
                                    <img src="<?php echo e(URL::asset('assets/images/users/avatar-3.jpg')); ?>" class="rounded-circle avatar-sm" alt="">
                                    <div class="flex-1">
                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <div class="conversation-name"><span class="time">10:00 AM</span></div>
                                                <p class="mb-0">Good Morning</p>
                                            </div>
                                            <div class="dropdown align-self-start">
                                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Copy</a>
                                                    <a class="dropdown-item" href="#">Save</a>
                                                    <a class="dropdown-item" href="#">Forward</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>

                        <li class="right">
                            <div class="conversation-list">
                                <div class="d-flex">
                                    <div class="flex-1">
                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <div class="conversation-name"><span class="time">10:02 AM</span></div>
                                                <p class="mb-0">Good morning</p>
                                            </div>
                                            <div class="dropdown align-self-start">
                                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Copy</a>
                                                    <a class="dropdown-item" href="#">Save</a>
                                                    <a class="dropdown-item" href="#">Forward</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="<?php echo e(URL::asset('assets/images/users/avatar-6.jpg')); ?>" class="rounded-circle avatar-sm" alt="">
                                </div>

                            </div>

                        </li>

                        <li>
                            <div class="conversation-list">
                                <div class="d-flex">
                                    <img src="<?php echo e(URL::asset('assets/images/users/avatar-3.jpg')); ?>" class="rounded-circle avatar-sm" alt="">
                                    <div class="flex-1">
                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <div class="conversation-name"><span class="time">10:04 AM</span></div>
                                                <p class="mb-0">
                                                    Hi there, How are you?
                                                </p>
                                            </div>
                                            <div class="dropdown align-self-start">
                                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Copy</a>
                                                    <a class="dropdown-item" href="#">Save</a>
                                                    <a class="dropdown-item" href="#">Forward</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <img src="<?php echo e(URL::asset('assets/images/users/avatar-3.jpg')); ?>" class="rounded-circle avatar-sm" alt="">
                                    <div class="flex-1">
                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <div class="conversation-name"><span class="time">10:04 AM</span></div>
                                                <p class="mb-0">
                                                    Waiting for your reply.As I heve to go back soon. i have to travel long distance.
                                                </p>
                                            </div>
                                            <div class="dropdown align-self-start">
                                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Copy</a>
                                                    <a class="dropdown-item" href="#">Save</a>
                                                    <a class="dropdown-item" href="#">Forward</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>

                        <li class="right">
                            <div class="conversation-list">
                                <div class="d-flex">
                                    <div class="flex-1">
                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <div class="conversation-name"><span class="time">10:08 AM</span></div>
                                                <p class="mb-0">
                                                    Hi, I am coming there in few minutes. Please wait!! I am in taxi right now.
                                                </p>
                                            </div>
                                            <div class="dropdown align-self-start">
                                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Copy</a>
                                                    <a class="dropdown-item" href="#">Save</a>
                                                    <a class="dropdown-item" href="#">Forward</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="<?php echo e(URL::asset('assets/images/users/avatar-6.jpg')); ?>" class="rounded-circle avatar-sm" alt="">
                                </div>
                            </div>

                        </li>

                        <li>
                            <div class="conversation-list">
                                <div class="d-flex">
                                    <img src="<?php echo e(URL::asset('assets/images/users/avatar-3.jpg')); ?>" class="rounded-circle avatar-sm" alt="">
                                    <div class="flex-1">
                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <div class="conversation-name"><span class="time">10:06 AM</span></div>
                                                <p class="mb-0">
                                                    Thank You very much, I am waiting here at StarBuck cafe.
                                                </p>
                                            </div>
                                            <div class="dropdown align-self-start">
                                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Copy</a>
                                                    <a class="dropdown-item" href="#">Save</a>
                                                    <a class="dropdown-item" href="#">Forward</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>


                        <li>
                            <div class="conversation-list">
                                <div class="d-flex">
                                    <img src="<?php echo e(URL::asset('assets/images/users/avatar-3.jpg')); ?>" class="rounded-circle avatar-sm" alt="">
                                    <div class="flex-1">
                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <div class="conversation-name"><span class="time">10:09 AM</span></div>
                                                <p class="mb-0">
                                                    img-1.jpg & img-2.jpg images for a New Projects
                                                </p>

                                                <ul class="list-inline message-img mt-3  mb-0">
                                                    <li class="list-inline-item message-img-list">
                                                        <a class="d-inline-block m-1" href="">
                                                            <img src="<?php echo e(URL::asset('assets/images/small/img-1.jpg')); ?>" alt="" class="rounded img-thumbnail">
                                                        </a>
                                                    </li>

                                                    <li class="list-inline-item message-img-list">
                                                        <a class="d-inline-block m-1" href="">
                                                            <img src="<?php echo e(URL::asset('assets/images/small/img-2.jpg')); ?>" alt="" class="rounded img-thumbnail">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dropdown align-self-start">
                                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Copy</a>
                                                    <a class="dropdown-item" href="#">Save</a>
                                                    <a class="dropdown-item" href="#">Forward</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="px-3">
                    <div class="row">
                        <div class="col">
                            <div class="position-relative">
                                <input type="text" class="form-control border bg-soft-light" placeholder="Enter Message...">
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary chat-send w-md waves-effect waves-light"><span class="d-none d-sm-inline-block me-2">Send</span> <i class="mdi mdi-send float-end"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- end card -->
    </div>
    <!-- end col -->
</div><!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- apexcharts -->
<script src="<?php echo e(URL::asset('/assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/libs/admin-resources/admin-resources.min.js')); ?>"></script>

<!-- dashboard init -->
<script src="<?php echo e(URL::asset('/assets/js/pages/dashboard.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<script>
    var defaultLatitude = -8.4512582;
    var defaultLongitude = 115.0783864;
    var map = L.map('map').setView([defaultLatitude, defaultLongitude], 9);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    var detailTracksData = <?php echo json_encode($trackDetails, 15, 512) ?>;
    var markers = {};

    detailTracksData.forEach(function(detailTrack) {
        var lat = detailTrack.latitude;
        var lng = detailTrack.longitude;
        var imageSrc = "<?php echo e(url('storage/')); ?>/" + detailTrack.image;
        <?php if(Route::is('dashboard.*')): ?>
            var routeUrl = "<?php echo e(route('dashboard.track.detail.show', ['id_track', 'id'])); ?>";
        <?php elseif(Route::is('admin.*')): ?>
            var routeUrl = "<?php echo e(route('admin.dashboard.track.detail.show', ['id_track', 'id'])); ?>";
        <?php endif; ?>
        
        routeUrl = routeUrl.replace('id_track', detailTrack.id_track).replace('id', detailTrack.id);
        var marker = L.marker([lat, lng]).addTo(map);

        var popupContent = `
            <div class="popup-container">
                <h6 class="popup-title">Track Details</h6>
                <ul>
                    <li><b>Biota:</b> ${detailTrack.biota.nama_biota}</li>
                    <li><b>Lokasi:</b> ${detailTrack.lokasi.nama_lokasi}</li>
                    <li><b>Keterangan:</b> ${detailTrack.keterangan}</li>
                    <li><a href="${routeUrl}" target="_blank" class="popup-link">Klik untuk informasi detail</a></li>
                </ul>
                <div class="image-container">
                    <img src="${imageSrc}" alt="Gambar biota" width="150px">
                </div>
            </div>
        `;

        if (!markers[lat]) {
            markers[lat] = {};
        }

        if (!markers[lat][lng]) {
            markers[lat][lng] = [];
        }

        markers[lat][lng].push(popupContent);
    });

    for (var lat in markers) {
        for (var lng in markers[lat]) {
            var marker = L.marker([lat, lng]).addTo(map);

            var combinedPopupContent = markers[lat][lng].join('<hr>'); // Combine popup content

            marker.on('mouseover', function(e) {
                this.bindPopup(combinedPopupContent).openPopup();
            });
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\dashboardusea3\resources\views/index.blade.php ENDPATH**/ ?>