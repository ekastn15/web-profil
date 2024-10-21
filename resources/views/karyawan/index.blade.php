@extends('layouts.app')
 
@section('title', 'karyawan')
 
@section('contents')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Karyawan</h1>

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
                            <a href="{{route ('karyawan.insert')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Jabatan</th>
                                            <th>Bidang</th>
                                            <th>No. Telepon</th>
                                            <th>Foto</th>
                                            <th>Dinas</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                        @foreach ($karyawan as $row)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->nip}}</td>
                                            <td>{{$row->jabatan}}</td>
                                            <td>{{$row->bidang}}</td>
                                            <td>{{$row->nomer_karyawan}}</td>
                                            <td>
                                            <img src="images/{{ $row->foto }}" alt="" width="60px" >
                                            </td>
                                            <td>{{$row->dinas ? $row->dinas->name_dinas : 'Tidak ada'}}</td>
                                            <td>
                                                <a href="{{ route('karyawan.edit', $row->id_karyawan) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                <form action="{{ route('karyawan.delete', $row->id_karyawan) }}" method="post" style="display: inline-block;">
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