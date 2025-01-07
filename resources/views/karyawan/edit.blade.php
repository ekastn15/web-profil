@extends('layouts.app')

@section('title', 'Edit Karyawan')

@section('contents')
    <div class="row">
        <div class="col-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">EDIT DATA KARYAWAN</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('karyawan.update', $karyawan->id_karyawan) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') 
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ $karyawan->name }}">
                        @error('name')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text" name="nip" class="form-control" value="{{ $karyawan->nip }}">
                        @error('nip')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" name="jabatan" class="form-control"value ="{{ $karyawan->jabatan}}">
                        @error('jabatan')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>Bidang</label>
                        <input type="text" name="bidang" class="form-control" value="{{ $karyawan->bidang}}">
                        @error('bidang')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="text" name="nomer_karyawan" class="form-control" value="{{ $karyawan->nomer_karyawan }}">
                        @error('nomer_karyawan')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                            <label>Foto</label>
                            <div class="input-group mb-3">
                                <input type="file" name="foto" class="form-control"id="inputGroupFile02" accept="image/*">
                                @error('foto')
                                {{ $message }}
                                @enderror
                            </div>
                            <div>
                                <img src="{{ asset('images/' . $karyawan->foto) }}" alt="Current Foto" width="100">
                            </div>
                        </div> 
                        <div class="form-group">
                        <label>Dinas</label>
                        <select name="id_dinas" class="form-control">
                        <option value="">Pilih Dinas</option>
                        @foreach($dinas as $item)
                            <option value="{{ $item->id_dinas }}" 
                                {{ $karyawan->id_dinas == $item->id_dinas ? 'selected' : '' }}>{{ $item->NAMA_SATKER }}</option>
                        @endforeach
                        </select>
                        @error('id_dinas')
                        {{$message}}
                        @enderror
                    </div> 
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
