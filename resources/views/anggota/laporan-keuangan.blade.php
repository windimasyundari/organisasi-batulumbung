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
            <div class="card bg-light" style="width: 100rem;">
                <div class="card-body bg-light">
                    <h4 class="card-title" style="font-weight: 800; "> {{$laporan_keuangan->kegiatan->nama_kegiatan}}</h4>
                    <p class="card-title">Jumlah Pemasukan : Rp {{ number_format($laporan_keuangan ->jmlh_pemasukan) }}</p>
                    <p class="card-text">Jumlah Pengeluaran : Rp {{ number_format($laporan_keuangan ->jmlh_pengeluaran) }}</p>
                    <p class="card-text">Tanggal : {{$laporan_keuangan->tanggal}}</p>
                    <p class="card-text">Keterangan : {{$laporan_keuangan->keterangan}}</p>
                </div>  
            </div>  
            @endforeach
            </div>                 
        </div>          
    </div>
@endsection