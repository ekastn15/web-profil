@extends('layouts.front.app')

@section('title', 'Contact')

@section('content')
<div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="section-heading text-uppercase text-white">Hubungi Kami</h1>
        </nav>
    </div>
</div>
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        @if(session('message'))
        <div class="alert alert-success text-center">{{ session('message') }}</div>
        @endif

        <div class="container mb-7 mt-6">
            <form action="{{ route('home.contact.insert') }}" method="post" class="shadow-lg p-4 rounded">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="nama_pengirim" class="mb-1">Nama Lengkap</label>
                            <input class="form-control" id="nama_pengirim" name="nama_pengirim" type="text"
                                placeholder="Masukkan nama Anda" required>
                            @error('nama_pengirim')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="saran" class="mb-1">Saran</label>
                    <textarea class="form-control" id="saran" name="saran" placeholder="Tuliskan saran Anda" rows="4"
                        required></textarea>
                    @error('saran')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="kritik" class="mb-1">Kritik</label>
                    <textarea class="form-control" id="kritik" name="kritik" placeholder="Tuliskan kritik Anda" rows="4"
                        required></textarea>
                    @error('kritik')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Kirim Pesan</button>
                </div>
            </form>
        </div>
</section>
@endsection