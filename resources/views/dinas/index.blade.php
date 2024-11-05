@extends('layouts.app')
 
@section('title', 'dinas')
 
@section('contents')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Dinas</h1>

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
                            <a href="{{route ('dinas.insert')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Dinas</th>
                                            <th>Alamat</th>
                                            <th>Tugas dan Fungsi</th>
                                            <th>Visi Misi</th>
                                            <th>logo</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                        @foreach ($dinas as $row)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->NAMA_SATKER}}</td>
                                            <td>{{$row->alamat}}</td>
                                            <td>{{$row->tugas_fungsi}}</td>
                                            <td>{{$row->visi_misi}}</td>
                                            <td>
                                            <img src="images/{{ $row->logo }}" alt="" width="60px" >
                                            </td>
                                            <td>
                                                <a href="{{ route('dinas.edit', $row->id_dinas) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>Ubah</a>
                                                <form action="{{ route('dinas.delete', $row->id_dinas) }}" method="post" style="display: inline-block;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                                        <i class="fas fa-trash"></i>Hapus
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