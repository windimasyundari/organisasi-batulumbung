@extends('layouts.main-pengurus')

@section('title', 'Detail Data Pengurus')

@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Detail Anggota</h4>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h6>Nama</h6>
                <p class="card-text">{{ $anggota->nama }}</p>

                <h6>NIK</h6>
                <p class="card-text">{{ $anggota->nik }}</p>

                <h6>Tempat, Tanggal Lahir</h6>
                <p class="card-text">{{ $anggota->tempat_lahir }}, {{ $anggota->tgl_lahir }}</p>

                <h6>Email</h6>
                <p class="card-text">{{ $anggota->email }}</p>

                <h6>Telp</h6>
                <p class="card-text">{{ $anggota->no_telp }}</p>

                <h6>Pekerjaan</h6>
                <p class="card-text">{{ $anggota->pekerjaan }}</p>

                <h6>Jenis Kelamin</h6>
                <p class="card-text">{{ $anggota->jenis_kelamin }}</p>

                <h6>Alamat</h6>
                <p class="card-text">{{ $anggota->alamat }}</p>

                <h6>Jenis Organisasi</h6>
                <p class="card-text">{{ $anggota->organisasi->jenis}}</p>

                <h6>Status</h6>
                <p class="card-text">{{ $anggota->status }}</p>
                
                <a href ="{{ $anggota->id }}/edit" class="btn btn-primary">Edit</a>

                <form action="{{ $anggota->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger text-light">Delete</button>
                </form>
                
                <span class="btn btn-success"><a href="/anggota/anggota" class="card-link text-light">Kembali</a></span>
            </div>
        </div>
    </div>
</div>

@endsection
            
           
    