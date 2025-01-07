@extends('layouts.app')

@section('title', 'Edit Agenda')

@section('contents')
    <div class="row">
        <div class="col-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">EDIT DATA AGENDA</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('agenda.update', $agenda->id_agenda) }}" method="post">
                        @csrf
                        @method('PUT') <!-- Untuk metode HTTP PUT -->
                        <div class="form-group">
                        <label>Agenda</label>
                        <input type="text" name="name_agenda" class="form-control" value="{{ $agenda->name_agenda }}">
                        @error('agenda')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ $agenda->tanggal}}">
                        @error('tanggal')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" value="{{ $agenda->lokasi }}">
                        @error('lokasi')
                        {{$message}}
                        @enderror
                    </div>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-save"></i>Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
