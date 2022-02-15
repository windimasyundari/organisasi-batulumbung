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
                    <form class="form mb-3" method="get" action="{{ route ('cariTanggal') }}">
                        <div class="col-md-6 ms-auto">
                            <input type="date" name="cariTanggal" class="form-control w-75 d-inline" id="cariTanggal" placeholder="Cari Judul ...">
                            <button type="submit" class="btn btn-primary mb-1"><i class="fa fa-search"></i> Cari</button>  
                        </div>                    
                    </form>

                    <!-- Tambah Data -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahData">
                    Tambah Data
                    </button>
                    <a href="{{ route ('export_laporan-keuangan') }}" class="btn btn-success my-3 text-light" target="_blank">Export Data</a>

                    @if (session('status'))
                        <div class="alert alert-success mt-3">
                            {{ session('status') }}
                        </div>
                        @elseif (session('alert'))
                        <div class="alert alert-danger mt-3">
                            {{ session('alert') }}
                        </div>
                    @endif

                    <div class="table-responsive mt-3">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">NO</th>
                                    <th class="border-top-0">PEMASUKAN</th>
                                    <th class="border-top-0">PENGELUARAN</th>
                                    <th class="border-top-0">TANGGAL</th>
                                    <th class="border-top-0">KETERANGAN</th>
                                    <th class="border-top-0">ID KEGIATAN</th>
                                    <th class="border-top-0">ID PENGURUS</th>
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
                                    <td>{{$laporan_keuangan->kegiatan_id}}</td>
                                    <td>{{$laporan_keuangan->pengurus_id}}</td>
                                    <td><a href="laporan/laporan-keuangan/{{ $laporan_keuangan->id }}" class="btn btn-primary" data-toggle="modal" data-target="#editData{{ $laporan_keuangan->id }}"><i class="bi bi-pencil-square"></i></a> | 
                                    <div class="modal fade" id="editData{{ $laporan_keuangan->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editDataLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editDataLabel">Form Edit Data</h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <form method="post" action="{{ route ('editLaporan', $laporan_keuangan->id)}}" style="width:100%">
                                                @method('patch')
                                                @csrf
                                                <div class="form-group">
                                                        <label for="jmlh_pemasukan">Jumlah Pemasukkan</label> 
                                                        <input type="text" name="jmlh_pemasukan" value="{{ ($laporan_keuangan->jmlh_pemasukan) }}" class="form-control @error('jmlh_pemasukan') is-invalid @enderror" 
                                                        id="jmlh_pemasukan" placeholder="Masukkan Jumlah Pemasukan">
                                                        @error ('jmlh_pemasukan')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="jmlh_pengeluaran">Jumlah Pengeluaran</label> 
                                                        <input type="text" name="jmlh_pengeluaran" value="{{ $laporan_keuangan->jmlh_pengeluaran }}" class="form-control @error('jmlh_pengeluaran') is-invalid @enderror" 
                                                        id="jmlh_pengeluaran" placeholder="Masukkan Jumlah Pengeluaran">
                                                        @error ('jmlh_pengeluaran')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tanggal">Tanggal</label> 
                                                        <input type="date" name="tanggal" value="{{ $laporan_keuangan->tanggal }}" class="form-control @error('tanggal') is-invalid @enderror" 
                                                        id="tanggal">
                                                        @error ('tanggal')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="keterangan">Keterangan</label> 
                                                        <input type="text" name="keterangan" value="{{ $laporan_keuangan->keterangan }}" class="form-control @error('keterangan') is-invalid @enderror" 
                                                        id="keterangan" placeholder="Masukkan Keterangan">
                                                        @error ('keterangan')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="kegiatan_id" class="form-label">ID Kegiatan</label>
                                                        <input type="text" name="kegiatan_id" value="{{ $laporan_keuangan->kegiatan_id }}" class="form-control @error('kegiatan_id') is-invalid @enderror" 
                                                        id="kegiatan_id" placeholder="Masukkan ID Kegiatan">
                                                        @error ('kegiatan_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="pengurus_id" class="form-label">ID Pengurus</label>
                                                        <input type="text" name="pengurus_id" value="{{ $laporan_keuangan->pengurus_id }}" class="form-control @error('pengurus_id') is-invalid @enderror" 
                                                        id="pengurus_id" placeholder="Masukkan ID Pengurus">
                                                        @error ('pengurus_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="button" class="btn btn-danger text-light" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="/laporan/laporan-keuangan/{{ $laporan_keuangan->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger text-light"><i class="bi bi-trash-fill"></i></button>
                                </form>    
                            </td>
                        </tr>
                        @empty
                        <td colspan="8" class="table-active text-center">Tidak Ada Data</td>
                    @endforelse
                    <tbody>
                </table>
            </div>

                    <!-- Modal -->
                    <div class="modal fade" id="tambahData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambahDataLabel">Form Tambah Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form method="post" action="{{ route ('tambahLaporan') }}" style="width:100%">
                                @csrf
                                    <div class="form-group">
                                        <label for="jmlh_pemasukan">Jumlah Pemasukkan</label> 
                                        <input type="text" name="jmlh_pemasukan" value="{{ old ('jmlh_pemasukan') }}" class="form-control @error('jmlh_pemasukan') is-invalid @enderror" 
                                        id="jmlh_pemasukan" placeholder="Masukkan Jumlah Pemasukan">
                                        @error ('jmlh_pemasukan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="jmlh_pengeluaran">Jumlah Pengeluaran</label> 
                                        <input type="text" name="jmlh_pengeluaran" value="{{ old ('jmlh_pengeluaran') }}" class="form-control @error('jmlh_pengeluaran') is-invalid @enderror" 
                                        id="jmlh_pengeluaran" placeholder="Masukkan Jumlah Pengeluaran">
                                        @error ('jmlh_pengeluaran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="tanggal">Tanggal</label> 
                                        <input type="date" name="tanggal" value="{{ old ('tanggal') }}" class="form-control @error('tanggal') is-invalid @enderror" 
                                        id="tanggal">
                                        @error ('tanggal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label> 
                                        <input type="text" name="keterangan" value="{{ old ('keterangan') }}" class="form-control @error('keterangan') is-invalid @enderror" 
                                        id="keterangan" placeholder="Masukkan Keterangan">
                                        @error ('keterangan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="kegiatan_id" class="form-label">ID Kegiatan</label>
                                        <input type="text" name="kegiatan_id" value="{{ old ('kegiatan_id') }}" class="form-control @error('kegiatan_id') is-invalid @enderror" 
                                        id="kegiatan_id" placeholder="Masukkan ID Kegiatan">
                                        @error ('kegiatan_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="pengurus_id" class="form-label">ID Pengurus</label>
                                        <input type="text" name="pengurus_id" value="{{ old ('pengurus_id') }}" class="form-control @error('pengurus_id') is-invalid @enderror" 
                                        id="pengurus_id" placeholder="Masukkan ID Pengurus">
                                        @error ('pengurus_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
  
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection