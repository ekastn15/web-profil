@extends('layouts.app')
 
@section('title', 'add karyawan')
 
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Karyawan</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('karyawan.add.insert')}}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control">
                        @error('name')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text" name="nip" class="form-control">
                        @error('nip')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" name="jabatan" class="form-control">
                        @error('jabatan')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>Bidang</label>
                        <input type="text" name="bidang" class="form-control">
                        @error('bidang')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="text" name="nomer_karyawan" class="form-control">
                        @error('nomer_karyawan')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                            <label>Foto</label>
                            <div class="input-group mb-3">
                                <input type="file" name="foto" class="form-control"id="inputGroupFile02" accept="image/*" required>
                                @error('foto')
                                {{ $message }}
                                @enderror
                            </div>
                        </div> 
                        <div class="form-group">
                        <label>Dinas</label>
                        <select name="id_dinas" class="form-control">
                        <option value="">Pilih Dinas</option>
                        @foreach($dinas as $item)
                            <option value="{{ $item->id_dinas }}">{{ $item->name_dinas }}</option>
                        @endforeach
                        </select>
                        @error('id_dinas')
                        {{$message}}
                        @enderror
                    </div> 
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Save</button>     
                    </form>          
                 </div>
                 </div>

        </div>
    </div>
@endsection