<header id="page-topbar">
    <script src="<?php echo e(asset('js/sweetalert2.js')); ?>"></script>

    <div class="navbar-header">
        <?php if(Auth::user()): ?>
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="<?php echo e(route('admin.dashboard.root')); ?>" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="<?php echo e(URL::asset('assets/images/usealogo.svg')); ?>" alt="" height="30">
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo e(URL::asset('assets/images/usealogo.svg')); ?>" alt="" height="24"> <span class="logo-txt">U-Sea</span>
                        </span>
                    </a>

                    <a href="<?php echo e(route('admin.dashboard.root')); ?>" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?php echo e(URL::asset('assets/images/usealogo.svg')); ?>" alt="" height="30">
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo e(URL::asset('assets/images/usealogo.svg')); ?>" alt="" height="24"> <span class="logo-txt">U-Sea</span>
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </div>

            <div class="d-flex">
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="<?php echo e(url('storage/'. Auth::user()->avatar)); ?>" alt="Avatar">
                        <span class="d-none d-xl-inline-block ms-1 fw-medium"><?php echo e(Auth::user()->name); ?></span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item " href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1"></i> <span key="t-logout"><?php echo app('translator')->get('translation.Logout'); ?></span></a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </div>

            </div>
        <?php endif; ?>
    </div>
</header>
<?php /**PATH D:\Laravel\dashboardusea3\resources\views/layouts/topbar.blade.php ENDPATH**/ ?>