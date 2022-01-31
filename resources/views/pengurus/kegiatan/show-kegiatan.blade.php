@extends('layouts.main-pengurus')

@section('title', 'Detail Data Kegiatan')

@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Detail Kegiatan</h4>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
    <table class="table table-light table-borderless">
        <tr>
            <th>Nama Kegiatan</th>
            <td>{{ $kegiatan->nama_kegiatan }}</td>
        </tr>

        <tr>
            <th>Tanggal | Waktu</th>
            <td>{{ $kegiatan->tanggal }} | {{ $kegiatan->waktu }}</td>
        </tr>

        <tr>
            <th>Tempat</th>
            <td>{{ $kegiatan->tempat }}</td>
        </tr>
        
        <tr>
            <th>Deskripsi</th>
            <td>{{ $kegiatan->deskripsi }}</td>
        </tr>
        
        <tr>
            <th>Gambar</th>
            <td>  
            @if ($kegiatan->image)
                <div style="max-height: 350px; overflow:hidden">
                    <img src="{{ asset('storage/'.$kegiatan->image) }}" alt="{{ $kegiatan->nama_kegiatan }}"
                    class="img-fluid mb-3">
                </div>
            @endif
            </td>
        </tr>  
    </table>

        <a href ="{{ $kegiatan->id }}/edit" class="btn btn-primary">EDIT</a>

        <form action="{{ $kegiatan->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger text-light">DELETE</button>
        </form>
        
        <a href="{{ route ('exportPDF') }}" class="btn btn-warning text-light"> DOWNLOAD</a>
        <a href="/kegiatan/kegiatan" class=" btn btn-success card-link text-light">Kembali</a>
       
    </div>
</div>

@endsection
            
           
    