@extends('layouts.frontend.app')
@section('judul', 'Kritik dan Saran')
@section('content')
<<<<<<< HEAD

<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Kritik dan Saran</h1>
            <p class="lead mb-0">Silakan berikan kritik dan saran Anda.</p>
        </div>
    </div>
</header>

<!-- Page content-->
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">Formulir Kritik dan Saran</div>
                <div class="card-body">
                    <!-- Form untuk kritik dan saran -->
                    <form action="{{ route('home.contact.insert') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_pengirim">Nama Lengkap</label>
                            <input class="form-control" id="nama_pengirim" name="nama_pengirim" type="text" placeholder="Masukkan nama Anda" required>
                        </div>
                        <div class="mb-3">
                            <label for="saran">Saran</label>
                            <textarea class="form-control" id="saran" name="saran" placeholder="Tuliskan saran Anda" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="kritik">Kritik</label>
                            <textarea class="form-control" id="kritik" name="kritik" placeholder="Tuliskan kritik Anda" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
