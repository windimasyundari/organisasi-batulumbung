@extends('layouts.main-pengurus')

@section('title', 'Tambah Data Laporan Keuangan')

@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Form Tambah Data Laporan Keuangan</h4>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <form method="post" action="/pengurus/create-laporan-keuangan" style="width:50%">
        @csrf
            <div class="form-group">
                <label for="jmlh_pemasukkan">Jumlah Pemasukkan</label> 
                <input type="text" name="jmlh_pemasukkan" value="{{ old ('jmlh_pemasukkan') }}" class="form-control @error('jmlh_pemasukkan') is-invalid @enderror" 
                id="jmlh_pemasukkan" placeholder="Masukkan Jumlah Pemasukkan">
                @error ('jmlh_pemasukkan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jmlh_pengeluaran">Jumlah Pengeluaran</label> 
                <input type="text" name="jmlh_pengeluaran" value="{{ old ('jmlh_pengeluaran') }}" class="form-control @error('jmlh_pengeluaran') is-invalid @enderror" 
                id="jmlh_pengeluaran" placeholder="Masukkan Jumlah Pengeluaran">
                @error ('jmlh_pengeluaran')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label> 
                <input type="text" name="keterangan" value="{{ old ('keterangan') }}" class="form-control @error('keterangan') is-invalid @enderror" 
                id="keterangan" placeholder="Masukkan Keterangan">
                @error ('keterangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kegiatan_id" class="form-label">ID Kegiatan</label>
                <input type="text" name="kegiatan_id" value="{{ old ('kegiatan_id') }}" class="form-control @error('kegiatan_id') is-invalid @enderror" 
                id="kegiatan_id" placeholder="Masukkan ID Kegiatan">
                @error ('kegiatan_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="pengurus_id" class="form-label">ID Pengurus</label>
                <input type="text" name="pengurus_id" value="{{ old ('pengurus_id') }}" class="form-control @error('pengurus_id') is-invalid @enderror" 
                id="pengurus_id" placeholder="Masukkan ID Pengurus">
                @error ('pengurus_id')
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
            
           
    