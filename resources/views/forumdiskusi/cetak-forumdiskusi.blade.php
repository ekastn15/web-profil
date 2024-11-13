@extends('layouts.app')

@section('title', 'Cetak Forum')

@section('contents')
<!-- Page Heading -->
<div class="content">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h1 class="card-title">Halaman Cetak Forum</h1>
        </div>
        
        <!-- Form untuk Ekspor Data -->
        <div class="card-body">
            <form action="{{ route('forum.export') }}" method="GET">
                <div class="form-group">
                    <label for="month">Bulan:</label>
                    <select name="month" id="month" class="form-control" required>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                        @endfor
                    </select>
                </div>

                <div class="form-group">
                    <label for="year">Tahun:</label>
                    <input type="number" name="year" id="year" class="form-control" value="{{ date('Y') }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Ekspor</button>
            </form>
        </div>
    </div>
</div>
@endsection