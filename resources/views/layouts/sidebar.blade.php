<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Web Profil</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route ('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    {{-- <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div> --}}

    <!-- Nav Item - Profile Collapse Menu -->
    @if (auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-database"></i>
            <span>Profil</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('dinas') }}">Dinas</a>
                <a class="collapse-item" href="{{ route('karyawan') }}">Pegawai</a>
            </div>
        </div>
    </li>
    @endif

    {{-- <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div> --}}

    <!-- Nav Item - Informasi Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" 
        aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Informasi</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('berita') }}">Berita</a>
                <a class="collapse-item" href="{{ route('unduh') }}">Unduh</a>
                <a class="collapse-item" href="{{ route('agenda') }}">Agenda</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Galeri Collapse Menu -->
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
    aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-photo-video"></i>
        <span>Galeri</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" 
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('galeri') }}">Foto</a>
                <a class="collapse-item" href="{{ route('video') }}">Video</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - User Collapse Menu -->
    @if (auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('akun') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Akun</span>
        </a>
    </li>
    @endif

    

    <!-- Nav Item - FAQ Collapse Menu -->
    @if (auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('faq') }}">
            <i class="fas fa-fw fa-question"></i>
            <span>FAQ</span>
        </a>
    </li>
    @endif


     <!-- Nav Item - Pages Collapse Menu -->
    @if (auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('feedback') }}">
            <i class="fas fa-fw fa-comments"></i>
            <span>Feedback</span>
        </a>
    </li>
    @endif


    <!-- Nav Item - Kontak Collapse Menu -->
    @if (auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kontak') }}">
            <i class="fas fa-fw fa-phone"></i>
            <span>Kontak</span>
        </a>
    </li>
    @endif

    <!-- Nav Item - Layanan Publik Collapse Menu -->
    @if (auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('layanan') }}">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>Layanan Publik</span>
        </a>
    </li>
    @endif


    {{-- <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div> --}}

</ul>