@extends('layouts.front.app')
@section('title', 'Tentang Kami')
@section('content')

<header class="masthead"></header>

<section class="page-section" id="about">
    <div class="container">
        <div class="row mb-4">
            <div class="col text-center">
                <h2 class="section-heading text-uppercase" style="color: #34495e;">Tentang Kami</h2>
                <h3 class="section-subheading text-muted" style="color: #7f8c8d;">Daftar Dinas</h3>
            </div>
        </div>
        <div class="row">
            {{-- {{ $dinas }} --}}

            
            @foreach ($dinas as $item)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100" style="border: none; background-color: #f8f9fa; border-radius: 15px;">
                    <img src="('images/' . $item->gambar_lokasi)" 
                         class="card-img-top img-fluid rounded-top" 
                         alt="" 
                         style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                    <div class="card-body" style="background-color: #ffffff;">
                        <h5 class="card-title" style="color: #2c3e50;">{{ $item->NAMA_SATKER }}</h5>
                        <h6 class="card-subtitle mb-2" style="color: #95a5a6;">Tugas dan Fungsi</h6>
                        <p class="card-text" style="color: #34495e;">{{ Str::limit($item->tugas_fungsi, 100) }}</p>
                        <h6 class="card-subtitle mb-2" style="color: #95a5a6;">Visi dan Misi</h6>
                        <p class="card-text" style="color: #34495e;">{{ Str::limit($item->visi_misi, 100) }}</p>
                    </div>
                    <div class="card-footer text-end" style="background-color: #f8f9fa; border-top: none;">
                        <a href="" class="btn btn-sm" style="background-color: #2c3e50; color: #ffffff; border-radius: 20px;">Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
