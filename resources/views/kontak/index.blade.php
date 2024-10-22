@extends('layouts.app')
 
@section('title', 'Kontak')
 
@section('contents')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Kontak</h1>

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
                            <a href="{{route ('kontak.insert')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>WhatsApp</th>
                                            <th>Email</th>
                                            <th>Instagram</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                        @foreach ($kontak as $row)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->nomer_wa}}</td>
                                            <td>    
                                                <a href="{{ $row->email_dinas }}" target="_blank" rel="noopener noreferrer">
                                                {{ $row->email_dinas }}
                                                </a>
                                            </td>
                                            <td>    
                                                <a href="{{ $row->instagram_dinas }}" target="_blank" rel="noopener noreferrer">
                                                {{ $row->instagram_dinas}}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('kontak.edit', $row->id_kontak) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                <form action="{{ route('kontak.delete', $row->id_kontak) }}" method="post" style="display: inline-block;">
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