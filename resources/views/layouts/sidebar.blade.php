<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                @if (Auth::user())
                    @can('jenis-biota')
                        <li>
                            <a href="{{ route('admin.dashboard.jenis-biota.index') }}">
                                <i data-feather="align-justify"></i>
                                <span data-key="t-dashboard">Jenis Biota</span>
                            </a>
                        </li>
                    @endcan
                    @can('biota')
                        <li>
                            <a href="{{ route('admin.dashboard.biota.index') }}">
                                <i data-feather="anchor"></i>
                                <span data-key="t-dashboard">Biota</span>
                            </a>
                        </li>
                    @endcan
                    @can('user')
                        <li>
                            <a href="{{ route('admin.dashboard.users.index') }}">
                                <i data-feather="user"></i>
                                <span data-key="t-dashboard">Users</span>
                            </a>
                        </li>
                    @endcan
                    @can('role')
                        <li>
                            <a href="{{ route('admin.dashboard.roles.index') }}">
                                <i data-feather="users"></i>
                                <span data-key="t-dashboard">Roles</span>
                            </a>
                        </li>
                    @endcan
                    @can('jenis-temuan')
                        <li>
                            <a href="{{ route('admin.dashboard.jenis-temuan.index') }}">
                                <i data-feather="book-open"></i>
                                <span data-key="t-dashboard">Jenis Temuan</span>
                            </a>
                        </li>
                    @endcan
                    @can('lokasi')
                        <li>
                            <a href="{{ route('admin.dashboard.lokasi.index') }}">
                                <i data-feather="airplay"></i>
                                <span data-key="t-dashboard">Lokasi</span>
                            </a>
                        </li>
                    @endcan
                    @can('laporan-nelayan')
                        <li>
                            <a href="{{ route('admin.dashboard.laporan-nelayan.index') }}">
                                <i data-feather="aperture"></i>
                                <span data-key="t-dashboard">Laporan Nelayan</span>
                            </a>
                        </li>
                    @endcan
                    @can('kondisi-perairan')
                        <li>
                            <a href="{{ route('admin.dashboard.kondisi-perairan.index') }}">
                                <i data-feather="archive"></i>
                                <span data-key="t-dashboard">Kondisi Perairan</span>
                            </a>
                        </li>
                    @endcan
                    @can('track')
                        <li>
                            <a href="{{ route('admin.dashboard.track.index') }}">
                                <i data-feather="activity"></i>
                                <span data-key="t-dashboard">Report Biota</span>
                            </a>
                        </li>
                    @endcan
                    @can('logs')
                        <li>
                            <a href="{{ route('admin.dashboard.logs.index') }}">
                                <i data-feather="pocket"></i>
                                <span data-key="t-dashboard">Logs</span>
                            </a>
                        </li>
                    @endcan
                    @can('sig')
                        <li>
                            <a href="{{ route('admin.dashboard.sig.index') }}">
                                <i data-feather="map"></i>
                                <span data-key="t-dashboard">SIG</span>
                            </a>
                        </li>
                    @endcan
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
