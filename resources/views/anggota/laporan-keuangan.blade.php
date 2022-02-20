@extends('layouts.main-anggota')

@section('title', 'Laporan Keuangan')

@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Laporan Keuangan</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row ">
            @foreach($laporan_keuangan as $laporan_keuangan)
            <div class="card bg-purple" style="width: 100rem;">
                <div class="card-body bg-purple">
                    <h4 class="card-title text-light">Nama Kegiatan : {{$laporan_keuangan->kegiatan->nama_kegiatan}}</h4>
                    <p class="card-title text-light">Jumlah Pemasukan : {{$laporan_keuangan->jmlh_pemasukan}}</p>
                    <p class="card-text text-light">Jumlah Pengeluaran : {{$laporan_keuangan->jmlh_pengeluaran}}</p>
                    <p class="card-text text-light">Tanggal : {{$laporan_keuangan->tanggal}}</p>
                    <p class="card-text text-light">Keterangan : {{$laporan_keuangan->keterangan}}</p>
                </div>  
            </div>  
            @endforeach
            </div>                 
        </div>          
    </div>
@endsection