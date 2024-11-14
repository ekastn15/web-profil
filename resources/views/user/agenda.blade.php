@extends('layouts.frontend.app')
@section('title', 'Agenda')
@section('content')

<header class="pt-5 pb-3 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Agenda</h1>
        </div>
    </div>
</header>

<div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Agenda</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agenda as $item)
                    <tr>
                        <td>{{ $item->name_agenda }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_terbit)->format('d M Y') }}</td>
                        <td>{{ $item->lokasi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                        {{ $agenda->links() }}
                        </ul>
                    </nav>
    </div>
</div> 
</div>
@endsection
