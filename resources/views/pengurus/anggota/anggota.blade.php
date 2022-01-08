@extends('layouts.main-pengurus')

@section('title', 'Anggota')

@section('content')
<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Daftar Anggota</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <span class="btn btn-primary "><a href="/pengurus/anggota/create-anggota" style="color:white">Tambah Data</a></span>
                    @if (session('status'))
                        <div class="alert alert-success mt-3">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">NO</th>
                                    <th class="border-top-0">NIK</th>
                                    <th class="border-top-0">NAMA</th>
                                    <th class="border-top-0">JENIS ORGANISASI</th>
                                    <th class="border-top-0">AKSI</th>
                                </tr>
                            </thead>
                            @foreach($anggota as $anggotakk)
                                <tr>
                                    <th scope="row">{{ $loop->iteration}}</th>
                                    <td>{{$anggotakk->nik}}</td>
                                    <td>{{$anggotakk->nama}}</td>
                                    <td>{{$anggotakk->organisasi->jenis}}</td>
                                    <td><a href="\anggota\anggota\{{ $anggotakk->id }}" class="btn btn-primary">Detail</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection