@extends('layouts.main-pengurus')

@section('title', 'Detail Data Laporan Kegiatan')

@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Detail Laporan Kegiatan</h4>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
    <table class="table table-light table-borderless">
        <tr>
            <th width ="200px ">Jumlah Pemasukan</th>
            <td>{{ $laporan_keuangan->jmlh_pemasukan }}</td>
        </tr>

        <tr>
            <th>Jumlah Pengeluaran</th>
            <td>{{ $laporan_keuangan->jmlh_pengeluaran }</td>
        </tr>

        <tr>
            <th> Tanggal</th>
            <td>{{ $laporan_keuangan->tanggal }</td>
        </tr>
        
        <tr>
            <th>Keterangan</th>
            <td>{{ $laporan_keuangan->keterangan }</td>
        </tr>
    </table>

    <a href ="{{ $laporan_keuangan->id }}/edit" class="btn btn-primary">Edit</a>

    <form action="{{ $laporan_keuangan->id }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger text-light">Delete</button>
    </form>

    <span class="btn btn-success"><a href="/laporan/laporan-keuangan" class="card-link text-light">Kembali</a></span>

    </div>
</div>

@endsection
            
           
    