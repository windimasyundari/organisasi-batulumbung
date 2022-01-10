@extends('layouts.main-pengurus')

@section('title', 'Tambah Data Absensi')

@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title"> Form Tambah Data Absensi</h4>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <form method="post" action="/pengurus/absensi/create-absensi" style="width:50%">
        @csrf
            <div class="form-group">
                <label for="status">Nama Kegiatan</label> 
                <input type="text" name="nama_kegiatan" value="{{ old ('nama_kegiatan') }}" class="form-control @error('nama_kegiatan') is-invalid @enderror" 
                id="nama_kegiatan" placeholder="Masukkan nama kegiatan">
                @error ('nama_kegiatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Tanggal</label> 
                <input type="date" name="tanggal" value="{{ old ('tanggal') }}" class="form-control @error('tanggal') is-invalid @enderror" 
                id="tanggal" placeholder="Masukkan Tanggal Kegiatan">
                @error ('tanggal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect">Jenis Organisasi</label>
                <select name="jenis" class="form-control" id="exampleFormControlSelect">
                    <option value="">--Pilih--</option>
                    <option value="1">Sekaa Teruna</option>
                    <option value="2">Sekaa Gong</option>
                    <option value="3">Sekaa Santi</option>
                    <option value="4">PKK</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
</div>

@endsection
            
           
    