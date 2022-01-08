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
        <div class="card">
            <div class="card-body">
                <h6>Judul</h6>
                <p class="card-text">{{ $pengumuman->judul }}</p>

                <h6>Tanggal</h6>
                <p class="card-text">{{ $pengumuman->tanggal }}</p>

                <h6>Isi Pengumuman</h6>
                <p class="card-text">{{ $pengumuman->isi}}</p>

                <h6>File</h6>
                <p class="card-text"><a href="{{route('file.download', $pengumuman->id)}}">Download File</a>
                </p>
                
                <a href ="{{ $pengumuman->id }}/edit" class="btn btn-primary">Edit</a>

                <form action="{{ $pengumuman->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger text-light">Delete</button>
                </form>
                
                <span class="btn btn-success"><a href="/pengumuman/pengumuman" class="card-link text-light">Kembali</a></span>
            </div>
        </div>
    </div>
</div>

@endsection
            
           
    