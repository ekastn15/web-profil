@extends('layouts.frontend.app')
@section('title', 'Unduhan')
@section('content')

<header class="pt-5 pb-3 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Dokumen</h1>
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
                    <th>Dokumen</th>
                    <th>Tanggal Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($unduh as $item)
                    <tr>
                        <td>{{ $item->name_doc }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_terbit)->format('d M Y') }}</td>
                        <td>
                            <a href="{{ asset('dokumen/' . $item->dokumen) }}" download class="btn btn-primary">
                            Unduh
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                        {{ $unduh->links() }}
                        </ul>
                    </nav>
    </div>
</div> 
</div>
@endsection
