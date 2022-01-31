@extends('layouts.main-pengurus')

@section('title', 'Pengumuman')

@section('content')
<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Daftar Pengumuman</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <a href="/pengurus/pengumuman/create-pengumuman" class="btn btn-primary"><i class="bi bi-plus-lg"></i> TAMBAH</a>
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
                                    <th class="border-top-0">ID PENGUMUMAN</th>
                                    <th class="border-top-0">JUDUL PENGUMUMAN</th>
                                    <th class="border-top-0">TANGGAL</th>
                                    <th class="border-top-0">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($pengumuman as $pengumumans)
                                <tr>
                                    <th scope="row">{{ $loop->iteration}}</th>
                                    <td>{{$pengumumans->id}}</td>
                                    <td>{{$pengumumans->judul}}</td>
                                    <td>{{$pengumumans->tanggal}}</td>
                                    <td><a href="\pengumuman\pengumuman\{{ $pengumumans->id }}" class="btn btn-primary"><i class="bi bi-eye-fill m-r-5"></i>Detail</a></td>
                                </tr>
                                @empty
                                <td colspan="5" class="table-active text-center">Tidak Ada Data</td>
                            @endforelse
                            </tbody>
                        </table>

                        Halaman {{ $pengumumans->currentPage() }}
                        dari {{ $pengumumans->total() }} <br/>
                        <!-- Data Per Halaman : {{ $pengumumans->perPage() }} <br/> <br> -->

                        {{  $pengumumans->links()}}
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection