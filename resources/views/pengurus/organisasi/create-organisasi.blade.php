@extends('layouts.main-pengurus')

@section('title', 'Tambah Data Organisasi')

@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Form Tambah Data Organisasi</h4>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <form method="post" action="/pengurus/organisasi/create-organisasi" style="width:50%">
        @csrf
            <div class="form-group">
                <label for="jenis">Jenis</label> 
                <input type="text" name="jenis" value="{{ old ('jenis') }}" class="form-control @error('jenis') is-invalid @enderror" 
                id="jenis" placeholder="Masukkan Jenis">
                @error ('jenis')
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
            
           
    