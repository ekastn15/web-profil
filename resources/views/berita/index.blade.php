@extends('layouts.app')
 
@section('title', 'berita')
 
@section('contents')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Berita</h1>

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
                            <a href="{{route ('berita.insert')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Judul Berita</th>
                                            <th>Nama Penulis</th>
                                            <th>Tanggal</th>
                                            <th>Foto</th>
                                            <th>Berita</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                        @foreach ($berita as $row)

                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->judul_berita}}</td>
                                            <td>{{$row->nama_penulis}}</td>
                                            <td>{{$row->tanggal}}</td>
                                            <td>{{$row->berita}}</td>
                                            <td>
                                            <img src="images/{{ $row->foto }}" alt="" width="60px" >
                                            </td>
                                            <td>
                                                <a href="{{ route('berita.edit', $row->id_berita) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                <form action="{{ route('berita.destroy', $row->id_berita) }}" method="POST" style="display: inline-block;">
                                                   @csrf
                                                   @method('delete')
                                                <button class="btn btn-danger m-0">Delete</button>
                                               </div>

                                            </td>
                                        </tr>
                                            
                                        @endforeach
                                    
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endsection