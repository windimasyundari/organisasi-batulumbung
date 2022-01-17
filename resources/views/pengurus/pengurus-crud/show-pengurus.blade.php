@extends('layouts.main-pengurus')

@section('title', 'Detail Data Pengurus')

@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Detail Pengurus</h4>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h6>Nama</h6>
                <p class="card-text">{{ $pengurus->nama }}</p>

                <h6>Jabatan</h6>
                <p class="card-text">{{ $pengurus->jabatan }}</p>

                <h6>Email</h6>
                <p class="card-text">{{ $pengurus->email }}</p>

                <h6>No Telp</h6>
                <p class="card-text">{{ $pengurus->no_telp }}</p>

                <h6>Jenis Kelamin</h6>
                <p class="card-text">{{ $pengurus->jenis_kelamin }}</p>

                <h6>Alamat</h6>
                <p class="card-text">{{ $pengurus->alamat }}</p>

                <h6>Jenis Organisasi</h6>
                <p class="card-text">{{ $pengurus->organisasi->jenis }}</p>

                <h6>Status</h6>
                <p class="card-text">{{ $pengurus->status }}</p>
                
                <a href ="{{ $pengurus->id }}/edit" class="btn btn-primary">Edit</a>

                <form action="{{ $pengurus->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger text-light">Delete</button>
                </form>
                
                <span class="btn btn-success"><a href="/pengurus/pengurus-crud" class="card-link text-light">Kembali</a></span>
            </div>
        </div>
    </div>
</div>

@endsection
            
           
    