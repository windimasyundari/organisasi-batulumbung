@extends('layouts.main-pengurus')

@section('title', 'Pengurus')

@section('content')
<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Daftar Pengurus</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <a href="/pengurus/pengurus-crud/create-pengurus" class="btn btn-primary"><i class="bi bi-plus-lg"></i> TAMBAH</a>
                    @if (session('status'))
                        <div class="alert alert-success mt-3">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive mt-3">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">NO</th>
                                    <th class="border-top-0">NAMA</th>
                                    <th class="border-top-0">JABATAN</th>
                                    <th class="border-top-0">JENIS ORGANISASI</th>
                                    <th class="border-top-0">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($pengurus as $pengurus)
                                <tr>
                                    <th scope="row">{{ $loop->iteration}}</th>
                                    <td>{{$pengurus->nama}}</td>
                                    <td>{{$pengurus->jabatan}}</td>
                                    <td>{{$pengurus->organisasi->jenis}}</td>
                                    <td><a href="\pengurus\pengurus-crud\{{ $pengurus->id }}" class="btn btn-primary"><i class="bi bi-eye-fill m-r-5"></i>Detail</a></td>
                                </tr>
                                @empty
                                <td colspan="5" class="table-active text-center">Tidak Ada Data</td>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection