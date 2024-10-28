@extends('layouts.app')

@section('title', 'Kritik dan Saran')

@section('contents')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Kritik dan Saran</h1>

{{-- @if(session('message'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{ session('message') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif --}}

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        
        
       <form method="GET" action="/filter">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <<div class="col">
                                <label>Start Date:</label>
                                <input type="date" name="start_date" class="form-control">
                               </div>
                            
                               <div class="col">
                                <label>End Date: </label>
                                <input type="date" name="end_date" class="form-control">
                               </div>
                 </div>
                    </div>
                </div>
                
                <div>
                    <button id="filter" class="btn btn-primary">Filter</button>
                   <a href="{{route ('forum.xlsx')}}" class="btn btn-primary btn-sm"><i class="fas fa-print"></i>Export</a>
                </div>
        </div>
       </form>  

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pengirim</th>
                        <th>Saran</th>
                        <th>Kritik</th>
                        {{-- <th>Tanggal</th> --}}
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($kritiksaran as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->nama_pengirim }}</td>
                        <td>{{ $row->saran }}</td>
                        <td>{{ $row->kritik }}</td>
                        <td>
                            {{-- <a href="" class="btn btn-print btn-sm"><i class="fas fa-print"></i>Cetak</a> --}}
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection