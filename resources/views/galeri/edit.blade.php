@extends('layouts.app')
 
@section('title', 'Edit Galeri')
 
@section('contents')
<div class="row">
@if(session('message'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{session('message')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
    <div class="col-10">
        <!-- Card: Rincian Galeri -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Rincian Galeri</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Nama Agenda</th>
                            <td>{{ $galeri->agenda->name_agenda }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ $galeri->agenda->tanggal }}</td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td>{{ $galeri->agenda->lokasi }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Card: Reset Image -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Reset Image</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Foto Galeri:</label>
                    @if(!empty($galeri->foto_galeri))
                        <div class="d-flex">
                            @foreach(explode(',', $galeri->foto_galeri) as $foto)
                                <div style="margin-right: 10px;">
                                    <img src="{{ asset('images/' . trim($foto)) }}" alt="Foto Galeri" width="100">
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>Tidak ada foto yang diunggah.</p>
                    @endif
                </div>
                <form action="{{ route('galeri.resetImage', $galeri->id_galeri) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mereset gambar?')">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
                </form>
            </div>
        </div>

        <!-- Card: Edit Foto -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Foto</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('galeri.update', $galeri->id_galeri) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="foto_galeri">Upload Foto Baru:</label>
                        <input type="file" class="form-control" id="foto_galeri" name="foto_galeri[]" accept="image/*" multiple required>
                    </div>
                    <small class="text-muted">
                        <ul>
                            <li>Format gambar: jpeg, png, jpg</li>
                            <li>Maksimum ukuran: 2 MB setiap foto</li>
                            <li>Maksimum upload 3 gambar</li>
                        </ul>
                    </small>
                    <button type="submit" class="btn btn-primary btn-sm mt-3"><i class="fas fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
