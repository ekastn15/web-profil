@extends('layouts.app')

@section('title', 'Laporan Forum')

@section('contents')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Laporan Forum</h1>

<!-- Form untuk memilih bulan -->
<form action="{{ route('kritiksaran.export') }}" method="POST" class="mb-4">
    @csrf
    <div class="form-row align-items-center">
        <div class="col-auto">
            <label for="month" class="sr-only">Pilih Bulan</label>
            <input type="month" id="month" name="month" class="form-control mb-2" required>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-2">Export Excel</button>
        </div>
    </div>
</form>

<!-- Tabel untuk menampilkan data kritik dan saran -->
<table class="table table-bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Pengirim</th>
            <th>Saran</th>
            <th>Kritik</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach ($kritiksaran as $row)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $row->nama_pengirim }}</td>
                <td>{{ $row->saran }}</td>
                <td>{{ $row->kritik }}</td>
                {{-- <td>{{ $row->created_at->format('Y-m-d') }}</td> <!-- Format tanggal --> --}}
                <td>
                    @if($row->foto)
                        <img src="{{ asset('images/' . $row->foto) }}" alt="Foto" width="60px">
                    @else
                        -
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection