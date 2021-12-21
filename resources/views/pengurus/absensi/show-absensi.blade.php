@extends('layouts.main-pengurus')

@section('title', 'Detail Data Absensi')

@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Detail Absensi</h4>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h6>ID Kegiatan</h6>
                <p class="card-text">{{ $absensi->kegiatan_id }}</p>

                <h6>Nama Kegiatan</h6>
                <p class="card-text">{{ $absensi->nama_kegiatan }}</p>

                <h6>Tanggal</h6>
                <p class="card-text">{{ $absensi->tanggal }}</p>

                <h6>Waktu</h6>
                <p class="card-text">{{ $absensi->waktu}}</p>

                <h6>Status</h6>
                <p class="card-text">{{ $absensi->status}}</p>
                
                <a href ="{{ $absensi->id }}/edit" class="btn btn-primary">Edit</a>

                <form action="{{ $absensi->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger text-light">Delete</button>
                </form>
                
                <span class="btn btn-success"><a href="/absensi/absensi" class="card-link text-light">Kembali</a></span>
            </div>
        </div>
    </div>
</div>

@endsection
            
           
    