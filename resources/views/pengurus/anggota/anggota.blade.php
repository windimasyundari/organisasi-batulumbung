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
                    <form class="form" method="get" action="{{ route ('cariAnggota') }}">
                        <div class="form-group w-100 mb-3">
                            <!-- <label for="cari" class="d-block mr-2">Nama</label> -->
                            <input type="text" name="cari" class="form-control w-75 d-inline" id="cari" placeholder="Masukkan keyword">
                            <button type="submit" class="btn btn-primary mb-1"><i class="fa fa-search"></i> Cari</button> 
                        </div>
                    </form>

                    <a href="/pengurus/anggota/create-anggota" class="btn btn-primary"><i class="bi bi-plus-lg"></i> TAMBAH</a>
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
                                    <th class="border-top-0">NIK</th>
                                    <th class="border-top-0">NAMA</th>
                                    <th class="border-top-0">JENIS ORGANISASI</th>
                                    <th class="border-top-0">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($anggota as $anggotakk)
                                <tr>
                                    <th scope="row">{{ $loop->iteration}}</th>
                                    <td>{{$anggotakk->nik}}</td>
                                    <td>{{$anggotakk->nama}}</td>
                                    <td>{{$anggotakk->organisasi_id}}</td>
                                    <td><a href="\anggota\anggota\{{ $anggotakk->id }}" class="btn btn-primary"><i class="bi bi-eye-fill m-r-5"></i>Detail</a></td>
                                </tr>
                                @empty
                                <td colspan="5" class="table-active text-center">Tidak Ada Data</td>
                            @endforelse
                            </tbody>
                        </table>

                        Halaman {{ $anggota->currentPage() }}
                        dari {{ $anggota->total() }} <br/>
                        <!-- Data Per Halaman : {{ $anggota->perPage() }} <br/> <br> -->

                        {{  $anggota->links()}}
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection