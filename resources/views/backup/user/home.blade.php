@extends('layouts.frontend.app')
@section('judul', 'Home')
@section('content')
<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">{{$dinas->NAMA_SATKER}}</h1>
            <p class="lead mb-0">{{$dinas->alamat}}</p>
            <a href="{{ route('home.about') }}" class="btn btn-primary mt-3">Tentang Kami</a>
        </div>
    </div>
</header>
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries (3 columns)-->
        <div class="col-lg-8">
            <div class="row">
                @foreach($posts as $post)
                    <!-- Blog post item -->
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <a href=""></a><img class="card-img-top" src="{{ asset('images/' . $post->foto) }}" alt="Image for {{ $post->title_berita }}" />
                            <div class="card-body">
                                <div class="small text-muted">{{ \Carbon\Carbon::parse($post->tanggal)->format('d M Y') }}</div>
                                <h2 class="card-title h4">{{ $post->title_berita }}</h2>
                                <p class="card-text">{{ Str::limit($post->dec_berita, 10) }}</p>
                                <a class="btn btn-primary" href="{{ route('home.show', $post->id_berita) }}">Selengkapnya →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination-->
            <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                        {{ $posts->links() }}
                        </ul>
                    </nav>
        </div>

        <!-- Side widgets (Search and Informasi)-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <div class="card mb-4">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                    </div>
                </div>
            </div>

            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Informasi</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="{{ route('home.agenda') }}">Agenda</a></li>
                                <li><a href="{{ route('home.unduh') }}">Unduhan</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
