@extends('layouts.main-anggota')

@section('title', 'Pengumuman')

@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Pengumuman</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row ">
        @foreach ($pengumuman as $pengumuman)
            <div class="card bg-light" style="width: 100rem;">
                <div class="card-body ">
                    <h4 class="card-title" style="font-weight: 800; ">{{$pengumuman->judul}}</h4>
                    <p class="card-text">{{$pengumuman->isi}}</p>
                    <a href="{{route('file.download', $pengumuman->id)}}" class="btn btn-danger text-light"><i class="bi bi-download"></i> Download</a>
                </div>
            </div>
        @endforeach
        </div>                 
    </div>          
</div>

@endsection