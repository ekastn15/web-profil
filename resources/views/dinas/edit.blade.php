@extends('layouts.app')

@section('title', 'Edit FAQ')

@section('contents')
    <div class="row">
        <div class="col-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Faq</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('dinas.update', $dinas->id_dinas) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') 
                        <div class="form-group">
                            <label>Nama Dinas</label>
                            <input type="text" name="name_dinas" class="form-control" value="{{ $dinas->name_dinas }}">
                            @error('name_dinas')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="{{ $dinas->alamat }}">
                            @error('alamat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tugas dan Fungsi</label>
                            <input type="text" name="tugas_fungsi" class="form-control" value="{{ $dinas->tugas_fungsi }}">
                            @error('tugas_fungsi')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Visi Misi</label>
                            <input type="text" name="visi_misi" class="form-control" value="{{ $dinas->visi_misi }}">
                            @error('visi_misi')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Logo</label>
                            <div class="input-group mb-3">
                                <input type="file" name="logo" class="form-control"id="inputGroupFile02" accept="image/*">
                                @error('logo')
                                {{ $message }}
                                @enderror
                            </div>
                            <div>
                                <img src="{{ asset('images/' . $dinas->logo) }}" alt="Current Logo" width="100">
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
