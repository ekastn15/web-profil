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
                    <form action="{{ route('faq.update', $faq->id_faq) }}" method="post">
                        @csrf
                        @method('PUT') <!-- Untuk metode HTTP PUT -->
                        <div class="form-group">
                            <label>Question</label>
                            <input type="text" name="question" class="form-control" value="{{ $faq->question }}">
                            @error('question')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Answer</label>
                            <input type="text" name="answer" class="form-control" value="{{ $faq->answer }}">
                            @error('answer')
                                <div class="text-danger">{{ $message }}</div>
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
