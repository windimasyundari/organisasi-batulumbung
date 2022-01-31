@extends('layouts.main-pengurus')

@section('title', 'Detail Data Pengumuman')

@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Detail Pengumuman</h4>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
    <table class="table table-light table-borderless">
        <tr>
            <th width ="200px ">Judul</th>
            <td>{{ $pengumuman->judul }}</td>
        </tr>

        <tr>
            <th>Tanggal | Waktu</th>
            <td>{{ $pengumuman->tanggal }} | {{ $pengumuman->waktu }}</td>
        </tr>
        
        <tr>
            <th>Isi Pengumuman</th>
            <td>{{ $pengumuman->isi }}</td>
        </tr>
        
        <tr>
            <th>File</th>
            <td><a href="{{route('file.download', $pengumuman->id)}}">Download File</a></td>
        </tr>
    </table>

    <a href ="{{ $pengumuman->id }}/edit" class="btn btn-primary">Edit</a>

    <form action="{{ $pengumuman->id }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger text-light">Delete</button>
    </form>

    <span class="btn btn-success"><a href="/pengumuman/pengumuman" class="card-link text-light">Kembali</a></span>

    </div>
</div>

@endsection
            
           
    