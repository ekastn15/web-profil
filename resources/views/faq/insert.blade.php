@extends('layouts.app')
 
@section('title', 'add faq')
 
@section('contents')
    <div class="row">
        <div class="col-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA FAQ</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('faq.add.insert')}}" method="post">
                    @csrf 
                    <div class="form-group">
                        <label>Question</label>
                        <input type="text" name="question" class="form-control">
                        @error('question')
                        {{$message}}
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>Answer</label>
                        <input type="text" name="answer" class="form-control">
                        @error('answer')
                        {{$message}}
                        @enderror
                    </div> 
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>Simpan</button>     
                    </form>          
                 </div>
                 </div>

        </div>
    </div>
@endsection