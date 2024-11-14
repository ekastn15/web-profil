@extends('layouts.frontend.app')

@section('content')
<div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4 mt-5" >
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{$berita->title_berita}}</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</div>
                            
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid" src="{{ asset('images/' . $berita->foto)}}" alt="Image for {{ $berita->title_berita }}" /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4">{{$berita->dec_berita}}</p>
                        </section>
                    </article>
            </div>
        </div>
</div>
@endsection
