@extends('layouts.main-pengurus')

@section('title', 'Edit Data Anggota')

@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Form Edit Data Anggota</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <form method="post" action="/anggota/pkk/{{ $anggota->id }}" style="width:50%">
        @method('patch')
        @csrf
            <div class="form-group">
                <label for="nama">Nama</label> 
                <input type="text" name="nama" value="{{ $anggota->nama }}" class="form-control @error('nama') is-invalid @enderror" 
                id="nama" placeholder="Masukkan Nama Lengkap">
                @error ('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label form="nik">NIK</label>
                <input type="text" name="nik" value="{{ $anggota->nik }}" class="form-control @error('nik') is-invalid @enderror"
                id="nik" placeholder="Masukkan NIK">
                @error('nik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" value="{{ $anggota->tempat_lahir }}" class="form-control @error('tempat_lahir') is-invalid @enderror" 
                id="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                @error ('tempat_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" value="{{ $anggota->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror" 
                id="tgl_lahir" placeholder="Tanggal Lahir">
                @error ('tgl_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="{{ $anggota->email }}" class="form-control @error('email') is-invalid @enderror" 
                id="email" placeholder="Masukkan Email">
                @error ('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" value="{{ $anggota->password }}" class="form-control @error('password') is-invalid @enderror" 
                id="password" placeholder="Masukkan Password">
                @error ('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="no_telp" class="form-label">Telp</label>
                <input type="text" name="no_telp" value="{{ $anggota->no_telp }}" class="form-control @error('no_telp') is-invalid @enderror" 
                id="no_telp" placeholder="Masukkan Nomor Telp">
                @error ('no_telp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect">Jenis Kelamin</label>
                <select name="jenis_kelamin" value="{{ $anggota->jenis_kelamin }}" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="exampleFormControlSelect">
                    <option value="">--Pilih--</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option valie="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                <input type="text" name="pekerjaan" value="{{ $anggota->pekerjaan }}" class="form-control @error('pekerjaan') is-invalid @enderror" 
                id="pekerjaan" placeholder="Masukkan Pekerjaan">
                @error ('pekerjaan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="textarea" name="alamat" value="{{ $anggota->alamat }}" class="form-control @error('alamat') is-invalid @enderror" 
                id="alamat" placeholder="Masukkan Alamat">
                @error ('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect">Jenis Organisasi</label>
                <select name="organisasi_id" value="{{ $anggota->organisasi_id }}" class="form-control @error('organisasi_id') is-invalid @enderror" 
                id="exampleFormControlSelect">
                    <option value="">--Pilih--</option>
                    <option value="1">Sekaa Teruna</option>
                    <option value="2">Sekaa Gong</option>
                    <option value="3">Sekaa Santi</option>
                    <option value="4">PKK</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect">Status</label>
                <select name="status" value="{{ $anggota->status }}" class="form-control @error('status') is-invalid @enderror" 
                id="exampleFormControlSelect">
                    <option value="">--Pilih--</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Edit Data</button>
        </form>
    </div>
</div>

@endsection