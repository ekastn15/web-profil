@extends('layouts.front.app')
@section('title', 'Team')
@section('content')
<section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Pegawai</h2>
            <h3 class="section-subheading text-muted">para pegawai dinas Situbondo</h3>
        </div>
        @foreach($pejabat as $item)
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="{{ asset('images/' . $item->foto) }}" alt="{{ $item->name }}">
                        <h4>{{ $item->name }}</h4>
                        <p class="text-muted">{{ $item->jabatan }}</p>
                    </div>
                </div>
            @endforeach
    </div>
</section>
@endsection
