<header id="page-topbar">
    <script src="{{ asset('js/sweetalert2.js') }}"></script>

    <div class="navbar-header">
        <nav class="navbar navbar-expand-md navbar-light bg-white fixed-top sticky-navigation">
            <a class="navbar-brand mx-auto" href="{{ route('dashboard.biota.index') }}">
                U-SEA
            </a>

            <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" 
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span data-feather="grid"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ route('home') }}">Homepage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ route('dashboard.biota.index') }}">Akses Nelayan</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
