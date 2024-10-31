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
                <li class="nav-item"><a class="nav-link" href="{{ route('home.about') }}">About Us</a></li>
                <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Information
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('agenda') }}">Agenda</a></li>
                <li><a class="dropdown-item" href="{{ route('unduh') }}">Unduh</a></li>

            </ul>
        </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home.team') }}">Team</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home.contact') }}">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
