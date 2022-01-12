@extends('layouts.main-pengurus')

@section('title', 'Detail Data Kegiatan')

@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Detail Kegiatan</h4>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h6>Nama Kegiatan</h6>
                <p class="card-text">{{ $kegiatan->nama_kegiatan }}</p>

                <h6>Tanggal | Waktu</h6>
                <p class="card-text">{{ $kegiatan->tanggal }} | {{ $kegiatan->waktu }}</p>

                <h6>Tempat</h6>
                <p class="card-text">{{ $kegiatan->tempat }}</p>

                <h6>Deskripsi</h6>
                <p class="card-text">{{ $kegiatan->deskripsi }}</p>

                <h6>Gambar</h6>
            
                @if ($kegiatan->image)
                <div style="max-height: 350px; overflow:hidden">
                    <img src="{{ asset('storage/'.$kegiatan->image) }}" alt="{{ $kegiatan->nama_kegiatan }}"
                    class="img-fluid mb-3">
                </div>
                @endif
                 <br>
                <a href ="{{ $kegiatan->id }}/edit" class="btn btn-primary">Edit</a>

                <form action="{{ $kegiatan->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger text-light">Delete</button>
                </form>
                
                <span class="btn btn-warning"><a href="/absensi/absensi" class="card-link text-light">Tambah Absensi</a></span>
                <span class="btn btn-success"><a href="/kegiatan/kegiatan" class="card-link text-light">Kembali</a></span>
            </div>
        </div>
    </div>
</div>

@endsection
            
           
    