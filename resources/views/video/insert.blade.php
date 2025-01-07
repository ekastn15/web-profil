@extends('layouts.app')
 
@section('title', 'add faq')
 
@section('contents')
    <div class="row">
        <div class="col-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('video.add.insert')}}" method="post">
                    @csrf 
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="judul_video" class="form-control" required>
                        @error('judul_video')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>Embed</label>
                        <textarea name="embed_video" class="form-control" required></textarea>
                        @error('embed_video')
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