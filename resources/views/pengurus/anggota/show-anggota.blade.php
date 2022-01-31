@extends('layouts.main-pengurus')

@section('title', 'Detail Data Pengurus')

@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Detail Anggota</h4>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <table class="table table-light table-borderless">
            <tr>
                <th width ="200px ">Nama</th>
                <td>{{ $anggota->nama }}</td>
                <td rowspan = "5"></td>
            </tr>

            <tr>
                <th>NIK</th>
                <td>{{ $anggota->nik }}</td>
            </tr>

            <tr>
                <th>Tempat, Tanggal Lahir</th>
                <td>{{ $anggota->tempat_lahir }}, {{ $anggota->tgl_lahir }}</td>
            </tr>
            
            <tr>
                <th>Email</th>
                <td>{{ $anggota->email }}</td>
            </tr>
            
            <tr>
                <th>Telp</th>
                <td>{{ $anggota->no_telp }}</td>
            </tr>
            
            <tr>
                <th>Pekerjaan</th>
                <td>{{ $anggota->pekerjaan }}</td>
            </tr>
            
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $anggota->jenis_kelamin }}</td>
            </tr>
            
            <tr>
                <th>Alamat</th>
                <td>{{ $anggota->alamat }}</td>
            </tr>
            
            <tr>
                <th>Jenis Organisasi</th>
                <td>{{ $anggota->organisasi->jenis }}</td>
            </tr>
            
            <tr>
                <th>Status</th>
                <td>{{ $anggota->status }}</td>
            </tr>
        </table>

        <a href ="{{ $anggota->id }}/edit" class="btn btn-primary">Edit</a>

        <form action="{{ $anggota->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger text-light">Delete</button>
        </form>

        <span class="btn btn-success"><a href="/anggota/anggota" class="card-link text-light">Kembali</a></span>
       
    </div>
</div>

@endsection
            
           
    