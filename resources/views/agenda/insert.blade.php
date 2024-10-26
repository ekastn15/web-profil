@extends('layouts.app')
 
@section('title', 'add agenda')
 
@section('contents')
    <div class="row">
        <div class="col-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('agenda.add.insert')}}" method="post">
                    @csrf 
                    <div class="form-group">
                        <label>Agenda</label>
                        <input type="text" name="name_agenda" class="form-control">
                        @error('name_agenda')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control">
                        @error('tanggal')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" class="form-control">
                        @error('lokasi')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>Editor</label>
                        <select name="id_users" class="form-control">
                        <option value="">Pilih Editor</option>
                        @foreach($user as $item)
                            <option value="{{ $item->id_users }}">{{ $item->karyawan->name}}</option>
                        @endforeach
                        </select>
                        @error('id_users')
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