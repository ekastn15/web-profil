@extends('layouts.app')

@section('title', 'Edit Berita')

@section('contents')
    <div class="row">
        <div class="col-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Berita</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('berita.update', $berita->id_berita) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') 
                        <div class="form-group">
                            <label>Judul Berita</label>
                            <input type="text" name="judul_berita" class="form-control" value="{{ $berita->judul_berita }}">
                            @error('judul_berita')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Penulis</label>
                            <input type="text" name="nama_penulis" class="form-control" value="{{ $berita->nama_penulis }}">
                            @error('nama_penulis')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="{{ $berita->tanggal }}">
                            @error('tanggal')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <div class="input-group mb-3">
                            <input type="file" name="foto" class="form-control"id="inputGroupFile02" accept="image/*">
                            @error('foto')
                                {{ $message }}
                            @enderror
                            </>
                        </div>

                        <div class="form-group">
                            <label>Berita</label>
                            <div class="input-group mb-3">
                                <input type="file" name="berita" class="form-control">
                                @error('berita')
                                {{ $message }}
                                @enderror
                            </div>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
