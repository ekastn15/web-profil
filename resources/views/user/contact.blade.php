@extends('layouts.front.app')

@section('title', 'Contact')


@section('content')
<section class="contact-section">
    @if(session('message'))
        <div class="alert alert-success text-center">{{ session('message') }}</div>
    @endif

    <div class="container mb-7 mt-6">
        <div class="text-center mb-15 mt-20">
            <h2 class="section-heading text-uppercase" style="margin-top: 20px; color:rgba(0, 0, 0, 0.7)">Hubungi Kami</h2>
            <p class="section-subheading" style="color:rgba(0, 0, 0, 0.7)">
                Kami ingin mendengar dari Anda! Silakan sampaikan saran dan kritik Anda.
            </p>
        </div>
        
        <form action="{{ route('home.contact.insert') }}" method="post" class="p-4 rounded">
            @csrf
       
            <div class="form-group mb-3">
                <label for="nama_pengirim" class="mb-2 text-black">Nama Lengkap</label>
                <input class="form-control" id="nama_pengirim" name="nama_pengirim" type="text" placeholder="Masukkan nama Anda" required>
                @error('nama_pengirim')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
           
            <div class="form-group mb-3">
                <label for="saran" class="mb-2 text-black">Saran</label>
                <textarea class="form-control" id="saran" name="saran" placeholder="Tuliskan saran Anda" rows="4" required></textarea>
                @error('saran')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-4">
                <label for="kritik" class="mb-2 text-black">Kritik</label>
                <textarea class="form-control" id="kritik" name="kritik" placeholder="Tuliskan kritik Anda" rows="4" required></textarea>
                @error('kritik')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="text-center">
                <button class="btn btn-primary btn-lg" id="submitButton" type="submit" style="color: #004f80 text-white">Kirim Pesan</button>
            </div>
        </form>
    </div>
</section>
@endsection

@section('styles')
<style>
    .contact-section,
    .contact-section .container,
    .contact-section form {
        background: transparent !important;
        box-shadow: none !important; /* Menghapus bayangan */
    }

    .contact-section h2.section-heading,
    .contact-section p.section-subheading {
        color: #fff;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
    }

    .form-group label {
        color: #fff;
    }

    .form-control {
        background-color: #fff;
        border-radius: 5px;
    }

    .btn-primary {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    .btn-primary:hover {
        background-color: #0dcaf0;
        border-color: #0dcaf0;
    }

    .alert-success {
        margin-bottom: 20px;
    }
</style>
@endsection

