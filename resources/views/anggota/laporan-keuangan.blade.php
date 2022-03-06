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
            @forelse($laporan as $laporans)
            <div class="card bg-purple" style="width: 100rem;">
                <div class="card-body bg-purple" style="color:white">
                    <h4 class="card-title" style="font-weight: 800; "> {{$laporans->kegiatan->nama_kegiatan}}</h4>
                    <p class="card-title">Jumlah Pemasukan : Rp {{ number_format($laporans ->jmlh_pemasukan) }}</p>
                    <p class="card-text">Jumlah Pengeluaran : Rp {{ number_format($laporans ->jmlh_pengeluaran) }}</p>
                    <p class="card-text">Tanggal : {{$laporans->tanggal}}</p>
                    <p class="card-text">Keterangan : {{$laporans->keterangan}}</p>
                </div>  
            </div>  
            @empty
            <div class="card-body bg-purple"  style="font-weight: 800; text-align:center; font-size:30px">Data Tidak Ditemukan</div>
            @endforelse
            </div>                 
        </div>          
    </div>
@endsection