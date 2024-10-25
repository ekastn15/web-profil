@extends('layouts.app')
 
@section('title', 'add berita')
 
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Forum Diskusi</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('forumdiskusi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                        <label>Nama Pengirim</label>
                        <input type="text" name="nama_pengirim" class="form-control">
                    </div> 
                    <div class="form-group">
                        <label>Saran</label>
                        <input type="text" name="saran" class="form-control">
                    </div> 
                    <div class="form-group">
                        <label>Kritik</label>
                        <input type="text" name="kritik" class="form-control">
                    </div> 
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="inputGroupFile02" accept="image/*" required>
                    </div>
                    {{-- <div class="form-group">
                        <label>File</label>
                        <input type="file" name="file" class="form-control" id="inputGroupFile02" accept="image/*" required>
                    </div> --}}
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Save</button>     
                    </form>          
                 </div>
                 </div>

        </div>
    </div>
@endsection