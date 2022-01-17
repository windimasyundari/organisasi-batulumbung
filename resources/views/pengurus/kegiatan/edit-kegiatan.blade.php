@extends('layouts.main-pengurus')

@section('title', 'Edit Data Kegiatan')

@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Form Edit Data Kegiatan</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <form method="post" action="/kegiatan/kegiatan/{{ $kegiatan->id }}" style="width:50%">
        @method('patch')
        @csrf
            <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan</label> 
                <input type="text" name="nama_kegiatan" value="{{ $kegiatan->nama_kegiatan }}" class="form-control @error('nama_kegiatan') is-invalid @enderror" 
                id="nama_kegiatan" placeholder="Masukkan Nama Kegiatan">
                @error ('nama_kegiatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label form="tanggal">Tanggal</label>
                <input type="date" name="tanggal" value="{{ $kegiatan->tanggal }}" class="form-control @error('tanggal') is-invalid @enderror"
                id="tanggal" placeholder="Masukkan Tanggal">
                @error('tanggal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="waktu" class="form-label">Waktu</label>
                <input type="time" name="waktu" value="{{ $kegiatan->waktu }}" class="form-control @error('waktu') is-invalid @enderror" 
                id="waktu" placeholder="Masukkan Waktu">
                @error ('waktu')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tempat" class="form-label">Tempat</label>
                <input type="text" name="tempat" value="{{ $kegiatan->tempat }}" class="form-control @error('tempat') is-invalid @enderror" 
                id="tempat" placeholder="Tempat">
                @error ('tempat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="deskripsi" name="deskripsi" value="{{ $kegiatan->deskripsi }}" class="form-control @error('deskripsi') is-invalid @enderror" 
                id="deskripsi" placeholder="Masukkan Deskripsi Kegiatan">
                @error ('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" 
                id="image">
                @error ('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Edit Data</button>
        </form>
    </div>
</div>

@endsection