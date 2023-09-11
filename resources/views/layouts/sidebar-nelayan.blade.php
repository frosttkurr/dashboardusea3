<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu"></li>
                <li>
                    <a href="{{ route('dashboard.biota.index') }}">
                        <i data-feather="anchor"></i>
                        <span data-key="t-dashboard">Lihat Biota</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.laporan-nelayan.index') }}">
                        <i data-feather="aperture"></i>
                        <span data-key="t-dashboard">Laporan Nelayan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.track.report.nelayan') }}">
                        <i data-feather="activity"></i>
                        <span data-key="t-dashboard">Lihat Report Biota</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.kondisi-perairan.index') }}">
                        <i data-feather="archive"></i>
                        <span data-key="t-dashboard">Lihat Kondisi Perairan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.sig.index') }}">
                            <i data-feather="map"></i>
                            <span data-key="t-dashboard">SIG</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
