@extends('layouts.app')
 
@section('title', 'add berita')
 
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Berita</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('berita.insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                        <label>Judul Berita</label>
                        <input type="text" name="judul_berita" class="form-control">
                    </div> 
                    <div class="form-group">
                        <label>Nama Penulis</label>
                        <input type="text" name="nama_penulis" class="form-control">
                    </div> 
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control">
                    </div> 
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control" id="inputGroupFile02" accept="image/*" required>
                    </div> 
                    <div class="form-group">
                            <label>Berita</label>
                            <div class="input-group mb-3">
                                <input type="text" name="berita" class="form-control"> 
                            </div>
                        </div> 
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Save</button>     
                    </form>          
                 </div>
                 </div>

        </div>
    </div>
@endsection