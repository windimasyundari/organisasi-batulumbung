@extends('layouts.main-pengurus')

@section('title', 'Tambah Data Pengumuman')

@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Form Tambah Data Pengumuman</h4>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <form method="post" action="/pengurus/pengumuman/create-pengumuman" style="width:50%"
        enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="judul">Judul</label> 
                <input type="text" name="judul" value="{{ old ('judul') }}" class="form-control @error('judul') is-invalid @enderror" 
                id="judul" placeholder="Masukkan Judul">
                @error ('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal</label> 
                <input type="date" name="tanggal" value="{{ old ('tanggal') }}" class="form-control @error('tanggal') is-invalid @enderror" 
                id="tanggal" placeholder="Masukkan Tanggal">
                @error ('tanggal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="isi" class="form-label">Isi Pengumuman</label>
                <input type="text" name="isi" value="{{ old ('isi') }}" class="form-control @error('isi') is-invalid @enderror" 
                id="isi" placeholder="Masukkan Isi">
                @error ('isi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="file" class="form-label">File</label>
                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" 
                id="file" placeholder="Masukkan file">
                @error ('file')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
</div>

@endsection
            
           
    