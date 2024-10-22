@extends('layouts.app')

@section('title', 'Edit Layanan')

@section('contents')
    <div class="row">
        <div class="col-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Layanan</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('layanan.update', $layanan->id_layanan) }}" method="post">
                        @csrf
                        @method('PUT') <!-- Untuk metode HTTP PUT -->
                        <div class="form-group">
                        <label>Layanan</label>
                        <input type="text" name="name_layanan" class="form-control" value="{{ $layanan->name_layanan }}">
                        @error('name_layanan')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>Link Layanan</label>
                        <input type="url" name="link_layanan" class="form-control" value="{{ $layanan->link_layanan }}">
                        @error('link_layanan')
                        {{$message}}
                        @enderror
                    </div>  
                    <div class="form-group">
                        <label>Dinas</label>
                        <select name="id_dinas" class="form-control">
                        <option value="">Pilih Dinas</option>
                        @foreach($dinas as $item)
                            <option value="{{ $item->id_dinas }}">{{ $item->NAMA_SATKER}}</option>
                        @endforeach
                        </select>
                        @error('id_dinas')
                        {{$message}}
                        @enderror
                    </div> 
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
