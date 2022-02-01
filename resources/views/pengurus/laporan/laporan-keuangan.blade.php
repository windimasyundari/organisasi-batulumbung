@extends('layouts.main-pengurus')

@section('title', 'Laporan Keuangan')

@section('content')
<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Daftar Laporan Keuangan</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <a href="/pengurus/laporan/create-laporan-keuangan" class="btn btn-primary"><i class="bi bi-plus-lg"></i> TAMBAH</a>
                    <a href="{{ route ('export_laporan-keuangan') }}" class="btn btn-success my-3 text-light" target="_blank">EXPORT LAPORAN KEUANGAN</a>
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
                                    <th class="border-top-0">JUMLAH PEMASUKAN</th>
                                    <th class="border-top-0">JUMLAH PENGELUARAN</th>
                                    <th class="border-top-0">TANGGAL</th>
                                    <th class="border-top-0">KETERANGAN</th>
                                    <th class="border-top-0">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($laporan_keuangan as $laporan_keuangan)
                                <tr>
                                    <th scope="row">{{ $loop->iteration}}</th>
                                    <td>Rp {{ number_format($laporan_keuangan ->jmlh_pemasukan) }}</td>
                                    <td>Rp {{ number_format($laporan_keuangan ->jmlh_pengeluaran) }}</td>
                                    <td>{{$laporan_keuangan->tanggal}}</td>
                                    <td>{{$laporan_keuangan->keterangan}}</td>
                                    <td><a href="/laporan-keuangan/{{ $laporan_keuangan->id }}/edit" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a> | 
                                        <form action="/laporan-keuangan/{{ $laporan_keuangan->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger text-light"><i class="bi bi-trash-fill"></i></button>
                                        </form>    
                                    </td>
                                </tr>
                                @empty
                                <td colspan="6" class="table-active text-center">Tidak Ada Data</td>
                            @endforelse
                            <tbody>
                        </table>

                        Halaman : {{ $laporan_keuangan->currentPage() }} <br>
                        Total Data : {{ $laporan_keuangan->total() }} <br/>
                        Data Per Halaman : {{ $laporan_keuangan->perPage() }} <br/> <br>

                        {{  $laporan_keuangan->links()}}
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection