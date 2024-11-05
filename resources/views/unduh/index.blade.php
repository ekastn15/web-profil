@extends('layouts.app')
 
@section('title', 'unduh')
 
@section('contents')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Unduh</h1>

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
                            <a href="{{route ('unduh.insert')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Dokumen</t>
                                            <th>Deskripsi</th>
                                            <th>Tanggal Terbit</th>
                                            <th>Dokumen</th>
                                            <th>Nama Penerbit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                        @foreach ($dokumen as $row)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->name_doc}}</td>
                                            <td>{{$row->tanggal_terbit}}</td>
                                            <td>{{$row->deskripsi}}</td>
                                            <td>
                                            <a href="{{ asset('dokumen/' . $row->dokumen) }}" target="_blank">Dokumen</a>
                                            </td>
                                            <td>{{$row->users->karyawan->name}}</td>
                                            <td>
                                                <a href="{{ route('unduh.edit', $row->id_dokumen) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>Ubah</a>
                                                <form action="{{ route('unduh.destroy', $row->id_dokumen) }}" method="POST" style="display: inline-block;">
                                                   @csrf
                                                   @method('delete')
                                                <button class="btn btn-danger m-0">Hapus</button>
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