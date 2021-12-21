@extends('layouts.main-pengurus')

@section('title', 'Edit Data Pengumuman')

@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Form Edit Data Pengumuman</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <form method="post" action="/pengumuman/pengumuman/{{ $pengumuman->id }}" style="width:50%"
        enctype="multipart/form-data">
        @method('patch')
        @csrf
            <div class="form-group">
                <label for="judul">Judul</label> 
                <input type="text" name="judul" value="{{ $pengumuman->judul }}" class="form-control @error('judul') is-invalid @enderror" 
                id="judul" placeholder="Masukkan Judul Pengumuman">
                @error ('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label form="tanggal">Tanggal</label>
                <input type="date" name="tanggal" value="{{ $pengumuman->tanggal }}" class="form-control @error('tanggal') is-invalid @enderror"
                id="tanggal" placeholder="Masukkan Tanggal">
                @error('tanggal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="isi" class="form-label">Isi Pengumuman</label>
                <input type="text" name="isi" value="{{ $pengumuman->isi }}" class="form-control @error('isi') is-invalid @enderror" 
                id="isi" placeholder="Masukkan Isi Pengumuman">
                @error ('isi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="file" class="form-label">File</label>
                <input type="file" name="file" value="{{ old ('file') }}" class="form-control @error('file') is-invalid @enderror" 
                id="file" placeholder="Masukkan file">
                @error ('file')
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