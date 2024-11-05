@extends('layouts.app')
 
@section('title', 'add berita')
 
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA BERITA</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('berita.insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                        <label>Judul Berita</label>
                        <input type="text" name="title_berita" class="form-control" >
                    @error('title_berita')
                    {{$message}}
                    @enderror
                    </div> 
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" >
                    @error('tanggal')
                    {{$message}} 
                    @enderror
                    </div> 
                    <div class="form-group">
                        <label>Berita</label>
                        <input type="text" name="dec_berita" class="form-control" >
                    @error('dec_berita')
                    {{$message}} 
                    @enderror   
                    </div> 
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control" id="inputGroupFile02" accept="image/*" required>
                    @error('foto')
                    {{$message}} 
                    @enderror 
                    </div> 
                    <div class="form-group">
                        <label>Nama Penulis</label>
                        <select name="id_users" class="form-control">
                        <option value="">Pilih Penulis</option>
                        @foreach($users as $item)
                            <option value="{{ $item->id_users }}">{{ $item->karyawan->name}}</option>
                        @endforeach
                        </select>
                        @error('id_users')
                        {{$message}}
                        @enderror
                    </div> 
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>     
                    </form>          
                 </div>
                </div>
        </div>
    </div>
@endsection