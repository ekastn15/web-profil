@extends('layouts.app')
 
@section('title', 'Edit Unduh')
 
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Unduh</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('unduh.update', $dokumen->id_dokumen) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama Dokumen</label>
                        <input type="text" name="name_doc" class="form-control" value="{{ $dokumen->name_doc }}" >
                    @error('name_doc')
                    {{$message}}
                    @enderror
                </div> 
                <div class="form-group">
                    <label>deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" value="{{ $dokumen->deskripsi }}" >
                @error('deskripsi')
                {{$message}} 
                @enderror   
                </div> 
                    <div class="form-group">
                        <label>Tanggal Terbit</label>
                        <input type="date" name="tanggal_terbit" class="form-control" value="{{ $dokumen->tanggal_terbit }}">
                    @error('tanggal_terbit')
                    {{$message}} 
                    @enderror
                    </div>  
                    <div class="form-group">
                        <label>Dokumen</label>
                        <input type="file" name="dokumen" class="form-control" id="inputGroupFile02" accept=".pdf, .doc, .docx, .xls, .xlsx">
                    @error('dokumen')
                    {{$message}} 
                    @enderror 
                    </div> 
                    <div>
                    <a href="{{ asset('dokumen/' . $dokumen->dokumen) }}" target="_blank">Lihat Dokumen</a>
                    </div>
                    <div class="form-group">
                        <label>Nama Penulis</label>
                        <select name="id_users" class="form-control">
                        <option value="">Pilih Penulis</option>
                        @foreach($user as $item)
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