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
        <div class="card">
            <div class="card-body">
                <h6>Nama Kegiatan</h6>
                <p class="card-text">{{ $laporan_kegiatan->nama_kegiatan }}</p>

                <h6>Tanggal</h6>
                <p class="card-text">{{ $laporan_kegiatan->tanggal }}</p>

                <h6>Waktu</h6>
                <p class="card-text">{{ $laporan_kegiatan->waktu }}</p>

                <h6>Tempat</h6>
                <p class="card-text">{{ $laporan_kegiatan->tempat }}</p>

                <h6>Foto</h6>
                <p class="card-file">{{ $laporan_kegiatan->foto}}</p>

                <h6>Keterangan</h6>
                <p class="card-text">{{ $laporan_kegiatan->keterangan}}</p>

                
                <a href ="{{ $laporan_kegiatan->id }}/edit" class="btn btn-primary">Edit</a>

                <form action="{{ $laporan_kegiatan->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger text-light">Delete</button>
                </form>
                
                <span class="btn btn-success"><a href="/laporan-kegiatan" class="card-link text-light">Kembali</a></span>
            </div>
        </div>
    </div>
</div>

@endsection
            
           
    