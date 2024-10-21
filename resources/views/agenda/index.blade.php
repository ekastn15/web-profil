@extends('layouts.app')
 
@section('title', 'faq')
 
@section('contents')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">FAQ</h1>

@if(session('message'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{session('message')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{route ('faq.insert')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                        @foreach ($faq as $row)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->question}}</td>
                                            <td>{{$row->answer}}</td>
                                            <td>
                                                <a href="{{ route('faq.edit', $row->id_faq) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                <form action="{{ route('faq.delete', $row->id_faq) }}" method="post" style="display: inline-block;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endsection