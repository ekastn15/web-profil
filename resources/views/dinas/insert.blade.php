@extends('layouts.app')
 
@section('title', 'add dinas')
 
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA DINAS</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('dinas.add.insert')}}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                            <label>ID OPD</label>
                            <input type="text" name="opd_id" class="form-control">
                            @error('opd_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kode Dinas</label>
                            <input type="text" name="KODE_SATKER" class="form-control" >
                            @error('KODE_SATKER')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Dinas</label>
                            <input type="text" name="NAMA_SATKER" class="form-control" >
                            @error('NAMA_SATKER')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" name="alamat" class="form-control">
                        @error('alamat')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>Tugas dan Fungsi</label>
                        <input type="text" name="tugas_fungsi" class="form-control">
                        @error('tugas_fungsi')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>Visi Misi</label>
                        <input type="text" name="visi_misi" class="form-control">
                        @error('visi_misi')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                            <label>Logo</label>
                            <div class="input-group mb-3">
                                <input type="file" name="logo" class="form-control"id="inputGroupFile02" accept="image/*" required>
                                @error('logo')
                                {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group">
                            <label>Gambar Lokasi</label>
                            <div class="input-group mb-3">
                                <input type="file" name="gambar_lokasi" class="form-control"id="inputGroupFile02" accept="image/*" required>
                                @error('gambar_lokasi')
                                {{ $message }}
                                @enderror
                            </div>
                        </div> 
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>Simpan</button>     
                    </form>          
                 </div>
                 </div>

        </div>
    </div>
@endsection