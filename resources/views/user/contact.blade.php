@extends('layouts.front.app')

@section('title', 'Contact')

@section('content')
<section class="contact-section py-5" style="background: linear-gradient(to right, #0d6efd, #0dcaf0);">
    @if(session('message'))
        <div class="alert alert-success text-center">{{ session('message') }}</div>
    @endif

    <div class="container">
        <div class="text-center mb-4">
            <h2 class="section-heading text-uppercase" style="color: white;">Hubungi Kami</h2>
            <p class="section-subheading" style="
                color: white; 
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);">
                Kami ingin mendengar dari Anda! Silakan sampaikan saran dan kritik Anda.
            </p>
        </div>
        
        <form action="{{ route('home.contact.insert') }}" method="post" class="shadow-lg p-4 rounded">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="nama_pengirim">Nama Lengkap</label>
                        <input class="form-control" id="nama_pengirim" name="nama_pengirim" type="text" placeholder="Masukkan nama Anda" required>
                        @error('nama_pengirim')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="form-group mb-3">
                <label for="saran">Saran</label>
                <textarea class="form-control" id="saran" name="saran" placeholder="Tuliskan saran Anda" rows="4" required></textarea>
                @error('saran')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-4">
                <label for="kritik">Kritik</label>
                <textarea class="form-control" id="kritik" name="kritik" placeholder="Tuliskan kritik Anda" rows="4" required></textarea>
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