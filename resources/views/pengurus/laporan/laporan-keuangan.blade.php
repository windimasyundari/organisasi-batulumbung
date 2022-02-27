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
                <form action="{{ route ('filterTanggalKeuangan') }}" method="post">
                @csrf
                    <div class="input-group mb-3 ms-auto" style="width:500px">
                        <input type="text" class="form-control" name="dari" onfocusin="(this.type='date')" value="{{ request('dari')}}" outfocusin="(this.type='text)" placeholder="Tanggal Awal">
                        <input type="text" class="form-control" name="sampai" onfocusin="(this.type='date')" value="{{ request('sampai')}}" outfocusin="(this.type='text)" placeholder="Tanggal Akhir">
                        <button class="btn btn-primary" type="submit" style="width:80px">Filter</button>
                    </div>
                </form>
               
                    <!-- Tambah Data -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahData">
                    Tambah Data
                    </button>
                    <a href="{{ route ('export_laporan-keuangan') }}" class="btn btn-success my-3 text-light" target="_blank">Export Data</a>

                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if(session()->has('status'))
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="table-responsive mt-3">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="border-top-0">NO</th>
                                    <th class="border-top-0">PEMASUKAN</th>
                                    <th class="border-top-0">PENGELUARAN</th>
                                    <th class="border-top-0">TANGGAL</th>
                                    <th class="border-top-0">JENIS ORGANISASI</th>
                                    <th class="border-top-0">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($laporan_keuangan as $laporan_keuangans)
                                <tr>
                                    <th scope="row">{{ $loop->iteration}}</th>
                                    <td>Rp {{ number_format($laporan_keuangans ->jmlh_pemasukan) }}</td>
                                    <td>Rp {{ number_format($laporan_keuangans ->jmlh_pengeluaran) }}</td>
                                    <td>{{$laporan_keuangans->tanggal}}</td>
                                    <td>{{$laporan_keuangans->organisasi->jenis}}</td>
                                    <td><a href="\laporan\laporan-keuangan\{{ $laporan_keuangans->id }}" class="btn btn-primary"><i class="bi bi-eye-fill m-r-5"></i>Detail</a></td>
                                    
                        </tr>
                        @empty
                        <td colspan="9" class="table-active text-center">Tidak Ada Data</td>
                    @endforelse
                    <tbody>
                </table> 
            </div>

                    <!-- Tambah Data -->
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
                                        <label for="exampleFormControlSelect">Jenis Organisasi</label>
                                        <select name="organisasi_id" class="form-control" id="exampleFormControlSelect">
                                            <option value="">--Pilih--</option>
                                            <option value="1">Sekaa Teruna</option>
                                            <option value="2">Sekaa Gong</option>
                                            <option value="3">Sekaa Santi</option>
                                            <option value="4">PKK</option>
                                        </select>
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
                                        <input type="text" name="pengurus_id" readonly value="{{ Auth::guard('pengurus')->user()->id }} " class="form-control @error('pengurus_id') is-invalid @enderror" 
                                        id="pengurus_id" >
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
                    <div class="d-flex justify-content-end">
                       
                    </div>
  
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection