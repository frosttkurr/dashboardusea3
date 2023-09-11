<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <?php if(Auth::user()): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jenis-biota')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.dashboard.jenis-biota.index')); ?>">
                                <i data-feather="align-justify"></i>
                                <span data-key="t-dashboard">Jenis Biota</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('biota')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.dashboard.biota.index')); ?>">
                                <i data-feather="anchor"></i>
                                <span data-key="t-dashboard">Biota</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.dashboard.users.index')); ?>">
                                <i data-feather="user"></i>
                                <span data-key="t-dashboard">Users</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.dashboard.roles.index')); ?>">
                                <i data-feather="users"></i>
                                <span data-key="t-dashboard">Roles</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jenis-temuan')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.dashboard.jenis-temuan.index')); ?>">
                                <i data-feather="book-open"></i>
                                <span data-key="t-dashboard">Jenis Temuan</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lokasi')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.dashboard.lokasi.index')); ?>">
                                <i data-feather="airplay"></i>
                                <span data-key="t-dashboard">Lokasi</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('kondisi-perairan')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.dashboard.kondisi-perairan.index')); ?>">
                                <i data-feather="archive"></i>
                                <span data-key="t-dashboard">Kondisi Perairan</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('track')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.dashboard.track.index')); ?>">
                                <i data-feather="activity"></i>
                                <span data-key="t-dashboard">Report Biota</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('logs')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.dashboard.logs.index')); ?>">
                                <i data-feather="pocket"></i>
                                <span data-key="t-dashboard">Logs</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sig')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.dashboard.sig.index')); ?>">
                                <i data-feather="map"></i>
                                <span data-key="t-dashboard">SIG</span>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<?php /**PATH D:\Laravel\dashboardusea3\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>