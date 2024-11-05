@extends('layouts.app')
 
@section('title', 'berita')
 
@section('contents')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Forum</h1>

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
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Pengirim</th>
                                            <th>Saran</th>
                                            <th>Kritik</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                        @foreach ($kritiksaran as $row)

                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->nama_pengirim}}</td>
                                            <td>{{$row->saran}}</td>
                                            <td>{{ $row->kritik }}</td>
                                            <td>{{$row->tanggal}}</td>
                                            <td>
                                            <img src="images/{{ $row->foto }}" alt="" width="60px" >
                                            </td>
                                            <td>
                                        </tr>
                                        @endforeach
                                    </tbody>
    </table>
    @endsection