@extends('layouts.front.app')
@section('title', 'About')
@section('content')
<section class="page-section mt-5" id="about">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Tentang Kami</h2>
            <h3 class="section-subheading text-muted">{{ $dinas->NAMA_SATKER }}</h3>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <div class="timeline-image">
                    <img class="img-fluid" src="{{ asset('images/' . $dinas->gambar_lokasi) }}" alt="Logo {{ $dinas->nama }}">
                </div>
            </div>
            <div class="col-md-8">
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>Tugas dan Fungsi</h4>
                       <p>{{ $dinas->tugas_fungsi }}</p>
                    </div>
                    <div class="timeline-heading">
                        <h4>Visi dan Misi</h4>
                        <p>{{ $dinas->visi_misi }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection