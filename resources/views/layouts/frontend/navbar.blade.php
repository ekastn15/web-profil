<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">Website OPD</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pegawai
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('home.pejabat') }}">Pejabat</a></li>
                                <li><a class="dropdown-item" href="{{ route('home.lainnya') }}">Lainnya</a></li>

                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('home.contact') }}">Kritik Saran</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('home.layanan') }}">Layanan</a></li>
                    </ul>
                </div>
            </div>
        </nav>