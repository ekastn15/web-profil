<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h1 class="m-0"><img src="{{ asset('images/' . $logo) }}" width="65px" alt="Logo"></h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pegawai</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="{{ route('home.pejabat') }}" class="dropdown-item">Pejabat</a>
                    <a href="{{ route('home.lainnya') }}" class="dropdown-item">Lainnya</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Galeri</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="{{ route('home.foto') }}" class="dropdown-item">Foto</a>
                    <a href="{{ route('home.video') }}" class="dropdown-item">Video</a>
                </div>
            </div>
            <a href="{{ route('home.unduh') }}" class="nav-item nav-link">Unduhan</a>
            <a href="{{ route('home.contact') }}" class="nav-item nav-link">Kritik & Saran</a>
            <a href="{{ route('home.layanan') }}" class="nav-item nav-link">Layanan</a>
        </div>
    </div>
</nav>