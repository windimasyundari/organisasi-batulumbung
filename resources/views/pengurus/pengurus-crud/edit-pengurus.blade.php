@extends('layouts.main-pengurus')

@section('title', 'Edit Data Pengurus')

@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Form Edit Pengurus</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
    <fieldset>
        <form method="post" action="/pengurus/pengurus-crud/{{ $pengurus->id }}" style="width:50%">
        @method('patch')
        @csrf
            <div class="form-group">
                <label for="nama">Nama</label> 
                <input type="text" name="nama" value="{{ $pengurus->nama }}" class="form-control @error('nama') is-invalid @enderror" 
                id="nama" placeholder="Masukkan Nama">
                @error ('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect">Jabatan</label>
                <select name="jabatan" value="{{ $pengurus->jabatan }}" class="form-control @error('jabatan') is-invalid @enderror" id="exampleFormControlSelect">
                    <option value="">--Pilih--</option>
                    <option value="Ketua">Ketua</option>
                    <option value="Wakil Ketua">Wakil Ketua</option>
                    <option value="Sekretaris">Sekretaris</option>
                    <option value="Bendahara">Bendahara</option>
                </select>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" value="{{ $pengurus->email }}" class="form-control @error('email') is-invalid @enderror" 
                id="email" placeholder="Masukkan Email">
                @error ('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" value="{{ $pengurus->password }}" class="form-control @error('password') is-invalid @enderror" 
                id="password" placeholder="Masukkan Password">
                @error ('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="no_telp" class="form-label">No Telp</label>
                <input type="no_telp" name="no_telp" value="{{ $pengurus->no_telp }}" class="form-control @error('no_telp') is-invalid @enderror" 
                id="no_telp" placeholder="Masukkan No Telp">
                @error ('no_telp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect">Jenis Kelamin</label>
                <select name="jenis_kelamin" value="{{ $pengurus->jenis_kelamin }}" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="exampleFormControlSelect">
                    <option value="">--Pilih--</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option valie="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="textarea" name="alamat" value="{{ $pengurus->alamat }}" class="form-control @error('alamat') is-invalid @enderror" 
                id="alamat" placeholder="Masukkan Alamat">
                @error ('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect">Jenis Organisasi</label>
                <select name="organisasi_id" value="{{ $pengurus->organisasi_id }}" class="form-control @error('organisasi_id') is-invalid @enderror" id="exampleFormControlSelect">
                    <option value="">--Pilih--</option>
                    <option value="1">Sekaa Teruna</option>
                    <option valie="2">Sekaa Gong</option>
                    <option valie="3">Sekaa Santi</option>
                    <option valie="4">PKK</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect">Status</label>
                <select name="status" value="{{ $pengurus->status }}" class="form-control @error('status') is-invalid @enderror" id="exampleFormControlSelect">
                    <option value="">--Pilih--</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Edit Data</button>
        </form>
        </fieldset>
    </div>
</div>

@endsection