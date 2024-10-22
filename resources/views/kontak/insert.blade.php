@extends('layouts.app')
 
@section('title', 'add Kontak')
 
@section('contents')
    <div class="row">
        <div class="col-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('kontak.add.insert')}}" method="post">
                    @csrf 
                    <div class="form-group">
                        <label>WhatsApp</label>
                        <input type="tel" name="nomer_wa" class="form-control">
                        @error('nomer_wa')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email_dinas" class="form-control">
                        @error('email_dinas')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>Instagram</label>
                        <input type="url" name="instagram_dinas" class="form-control">
                        @error('instagram_dinas')
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
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Save</button>     
                    </form>          
                 </div>
                 </div>

        </div>
    </div>
@endsection