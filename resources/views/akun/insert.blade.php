@extends('layouts.app')
 
@section('title', 'add akun')
 
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA AKUN</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('akun.add.insert')}}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                        @error('email')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                        @error('password')
                        {{$message}}
                        @enderror
                    </div> 
                        <div class="form-group">
                        <label>Nama</label>
                        <select name="id_karyawan" class="form-control" required>
                        <option value="">Pilih Karyawan</option>
                        @foreach($karyawan as $item)
                            <option value="{{ $item->id_karyawan }}">{{ $item->name}}</option>
                        @endforeach
                        </select>
                        @error('id_karyawan')
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