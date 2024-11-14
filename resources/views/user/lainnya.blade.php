@extends('layouts.frontend.app')
@section('judul', 'Kritik dan Saran')
@section('content')
<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Pegawai OPD</h1>
            <p class="lead mb-0">Kabupaten Situbondo Jawa Timur 2024</p>
        </div>
    </div>
</header>

<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Data Karyawan (3 rows, 5 columns)-->
        <div class="col-lg-12">
            <div class="row">
                @foreach($pegawai as $item)
                    <div class="col-md-2 mb-4">
                        <!-- Karyawan Item -->
                        <div class="text-center">
                            <img class="img-fluid rounded-circle mb-3" src="{{ asset('images/' . $item->foto) }}" alt="{{ $item->foto }}" style="width: 100px; height: 100px; object-fit: cover;">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->jabatan }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination-->
            <nav aria-label="Pagination">
                <hr class="my-0" />
                <ul class="pagination justify-content-center my-4">
                    {{ $pegawai->links() }} <!-- Pagination links -->
                </ul>
            </nav>
        </div>
    </div>
</div>

@endsection
