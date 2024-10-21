@extends('layouts.app')
 
@section('title', 'add dinas')
 
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Dinas</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('dinas.add.insert')}}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                        <label>Nama Dinas</label>
                        <input type="text" name="name_dinas" class="form-control">
                        @error('name_dinas')
                        {{$message}}
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
                        </div> 
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Save</button>     
                    </form>          
                 </div>
                 </div>

        </div>
    </div>
@endsection