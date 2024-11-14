@extends('layouts.frontend.app')
@section('title', 'About')
@section('content')

<header class="pt-5 pb-3 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Tentang Kami</h1>
        </div>
    </div>
</header>

<div class="container mt-5">
    <div class="row">
        <!-- Gambar Lokasi -->
        <div class="col-lg-6 mb-4">
        <figure class="mb-4"><img src="{{ asset('images/'. $dinas->gambar_lokasi) }}" alt="Lokasi Dinas" class="card-img-top"></figure>
        </div>

        <!-- Informasi Dinas -->
        <div class="col-lg-6">
            <h2>{{ $dinas->NAMA_SATKER }}</h2>

            <h3 class="mt-4">Tugas dan Fungsi</h3>
            <p>{{ $dinas->tugas_fungsi }}</p>

            <h3 class="mt-4">Visi Misi</h3>
            <p>{{ $dinas->visi_misi }}</p>

            <h3 class="mt-4">Alamat</h3>
            <p>{{ $dinas->alamat }}</p>
        </div>
    </div>
</div>

@endsection
