@extends('layouts.main-pengurus')

@section('title', 'Tambah Data Pengurus')

@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Form Tambah Data Pengurus</h4>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <form method="post" action="/pengurus/pengurus/create-pengurus" style="width:50%">
        @csrf
            <div class="form-group">
                <label for="nama">Nama</label> 
                <input type="text" name="nama" value="{{ old ('nama') }}" class="form-control @error('nama') is-invalid @enderror" 
                id="nama" placeholder="Masukkan Nama">
                @error ('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect">Jabatan</label>
                <select name="jabatan" value="{{ old ('jabatan') }}" class="form-control" id="exampleFormControlSelect">
                    <option value="">--Pilih--</option>
                    <option value="Ketua">Ketua</option>
                    <option value="Wakil Ketua">Wakil Ketua</option>
                    <option value="Sekretaris">Sekretaris</option>
                    <option value="Bendahara">Bendahara</option>
                </select>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" value="{{ old ('email') }}" class="form-control @error('email') is-invalid @enderror" 
                id="email" placeholder="Masukkan Email">
                @error ('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" value="{{ old ('password') }}" class="form-control @error('password') is-invalid @enderror" 
                id="password" placeholder="Masukkan Password">
                @error ('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Konfirmasi Password</label>
                <input type="password" name="konfirmpassword" value="{{ old ('konfirmpassword') }}" class="form-control @error('konfirmpassword') is-invalid @enderror" 
                id="konfirmpassword" placeholder="Masukkan Password">
                @error ('konfirmpassword')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect">Jenis Kelamin</label>
                <select name="jenis_kelamin" value="{{ old ('jenis_kelamin') }}" class="form-control" id="exampleFormControlSelect">
                    <option value="">--Pilih--</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option valie="Perempuan">Perempuan</option>
                </select>
            
            </div>

            <div class="form-group">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="textarea" name="alamat" value="{{ old ('alamat') }}" class="form-control @error('alamat') is-invalid @enderror" 
                id="alamat" placeholder="Masukkan Alamat">
                @error ('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect">Jenis Organisasi</label>
                <select name="organisasi_id" class="form-control" id="exampleFormControlSelect">
                    <option value="">--Pilih--</option>
                    <option value="1">Sekaa Teruna</option>
                    <option value="2">Sekaa Gong</option>
                    <option value="3">Sekaa Santi</option>
                    <option value="4">PKK</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect">Status</label>
                <select name="status" value="{{ old ('status') }}" class="form-control" id="exampleFormControlSelect">
                    <option value="">--Pilih--</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
</div>

@endsection
            
           
    