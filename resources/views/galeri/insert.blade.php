@extends('layouts.app')
 
@section('title', 'add Galeri')
 
@section('contents')
    <div class="row">
        <div class="col-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">TAMBAH Galeri</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('galeri.add.insert')}}" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                        <label for="foto_galeri">Unggah Foto (Maks. 3 Foto)</label>
                        <input type="file" class="form-control" id="foto_galeri" name="foto_galeri[]" accept="image/*" multiple required>
                        <small class="text-muted">Format gambar: jpeg, png, jpg. Maksimum ukuran: 2 MB.</small>
                    </div> 
                    <div class="form-group">
                        <label>Agenda</label>
                        <select name="id_agenda" class="form-control">
                        <option value="">Pilih Agenda</option>
                        @foreach($agenda as $item)
                            <option value="{{ $item->id_agenda }}">{{ $item->name_agenda}}</option>
                        @endforeach
                        </select>
                        @error('id_agenda')
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