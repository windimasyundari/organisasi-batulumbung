@extends('layouts.main-pengurus')

@section('title', 'Edit Data Laporan Kegiatan')

@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Form Edit Data Laporan Kegiatan</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <form method="post" action="/laporan-kegiatan/{{ $laporan_kegiatan->id }}" style="width:50%">
        @method('patch')
        @csrf
            <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan</label> 
                <input type="text" name="nama_kegiatan" value="{{ $laporan_kegiatan->nama_kegiatan }}" class="form-control @error('nama_kegiatan') is-invalid @enderror" 
                id="nama_kegiatan" placeholder="Masukkan Nama Kegiatan">
                @error ('nama_kegiatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label form="tanggal">Tanggal</label>
                <input type="date" name="tanggal" value="{{ $laporan_kegiatan->tanggal }}" class="form-control @error('tanggal') is-invalid @enderror"
                id="tanggal" placeholder="Masukkan Tanggal">
                @error('tanggal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label form="waktu">Waktu</label>
                <input type="time" name="waktu" value="{{ $laporan_kegiatan->waktu }}" class="form-control @error('waktu') is-invalid @enderror"
                id="waktu" placeholder="Masukkan Waktu">
                @error('waktu')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label form="tempat">Tempat</label>
                <input type="text" name="tempat" value="{{ $laporan_kegiatan->tempat }}" class="form-control @error('tempat') is-invalid @enderror"
                id="tempat" placeholder="Masukkan Tempat">
                @error('tempat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label form="foto">Foto</label>
                <input type="file" name="foto" value="{{ $laporan_kegiatan->foto }}" class="form-control @error('foto') is-invalid @enderror"
                id="foto" placeholder="Masukkan Foto">
                @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" name="keterangan" value="{{ $laporan_kegiatan->keterangan }}" class="form-control @error('keterangan') is-invalid @enderror" 
                id="keterangan" placeholder="Masukkan Keterangan">
                @error ('keterangan')
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