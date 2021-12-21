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
                <label for="status">Status</label> 
                <input type="text" name="status" value="{{ old ('status') }}" class="form-control @error('status') is-invalid @enderror" 
                id="status" placeholder="Masukkan status">
                @error ('status')
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
            
           
    