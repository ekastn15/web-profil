<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/'. $logo) }}" alt="...">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home.about') }}">Tentang Kami</a></li>
                <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Pegawai
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('agenda') }}">Pejabat</a></li>
                <li><a class="dropdown-item" href="{{ route('unduh') }}">Lainnya</a></li>

            </ul>
        </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home.team') }}">Tim Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home.contact') }}">Kritik dan Saran</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home.layanan') }}">Layanan</a></li>
            </ul>
        </div>
    </div>
</nav>
