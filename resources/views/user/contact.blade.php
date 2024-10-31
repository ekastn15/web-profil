@extends('layouts.front.app')
@section('title', 'Contact')
@section('content')
<section class="page-section" id="contact">
@if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

    <div class="container col-md-8 mx-auto">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
            <h3 class="section-subheading text-muted">Sampaikan Saran dan Kritikmu</h3>
        </div>
        <form action="{{ route('home.contact.insert') }}" method="post">
            @csrf
            <div class="row align-items-stretch mb-3">
                <div class="col-md-6 mx-auto">
                    <div class="form-group mb-3">
                        <input class="form-control" id="nama_pengirim" name="nama_pengirim" type="text" placeholder="Nama *" required>
                        @error('nama_pengirim')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group form-group-textarea mb-md-3">
                        <textarea class="form-control" id="saran" name="saran" placeholder="Saran *" required></textarea>
                        @error('saran')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group form-group-textarea mb-md-3">
                        <textarea class="form-control" id="kritik" name="kritik" placeholder="Kritik *" required></textarea>
                        @error('kritik')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Kirim</button>
            </div>
        </form>
    </div>
</section>
@endsection
