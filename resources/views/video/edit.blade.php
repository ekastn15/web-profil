@extends('layouts.app')

@section('title', 'Edit Video')

@section('contents')
    <div class="row">
        <div class="col-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">EDIT DATA </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('video.update', $video->id_video) }}" method="post">
                        @csrf
                        @method('PUT') <!-- Untuk metode HTTP PUT -->
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="judul_video" class="form-control" value="{{ $video->judul_video }}">
                            @error('judul_video')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Embed Video</label>
                            <textarea name="embed_video" class="form-control" >{{ $video->embed_video }}</textarea>
                            @error('embed_video')
                                <div class="text-danger">{{ $message }}</div>
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
