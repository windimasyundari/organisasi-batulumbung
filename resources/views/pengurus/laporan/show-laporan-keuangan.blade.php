@extends('layouts.main-pengurus')

@section('title', 'Detail Data Laporan Kegiatan')

@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Detail Laporan Keuangan</h4>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <table class="table table-light table-borderless">
            <tr>
                <th>Nama Pengurus</th>
                <td>{{$laporan->pengurus->nama}}</td>
            </tr>

            <tr>
                <th> Nama Kegiatan</th>
                <td>{{$laporan->kegiatan->nama_kegiatan}}</td>
            </tr>
            <tr>
                <th width ="200px ">Jumlah Pemasukan</th>
                <td>Rp {{ number_format ($laporan->jmlh_pemasukan)}}</td>
            </tr>

            <tr>
                <th>Jumlah Pengeluaran</th>
                <td>Rp {{ number_format ($laporan->jmlh_pengeluaran)}}</td>
            </tr>

            <tr>
                <th> Tanggal</th>
                <td>{{$laporan->tanggal}}</td>
            </tr>

            <tr>
                <th> Jenis Organisasi</th>
                <td>{{$laporan->organisasi->jenis}}</td>
            </tr>

            <tr>
                <th>Keterangan</th>
                <td>{{$laporan->keterangan}}</td>
            </tr>
        </table>
        <a href ="{{ $laporan->id }}/edit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editData">Edit</a>

        <form action="{{ $laporan->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger text-light">Delete</button>
        </form>

    <span class="btn btn-success"><a href="/laporan/laporan-keuangan" class="card-link text-light">Kembali</a></span>
    </div>
    
    <!-- Edit Data -->
    <!-- Modal -->
    <div class="modal fade" id="editData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editDataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataLabel">Form Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="post" action="{{ route ('editLaporan', $laporan->id) }}" style="width:100%">
                @method('put')
                @csrf
                    <div class="form-group">
                        <label for="nama">Nama Pengurus</label> 
                        <input type="text" readonly name="nama" value="{{ $laporan->pengurus->nama }}" class="form-control @error('nama') is-invalid @enderror" 
                        id="nama" placeholder="Masukkan Nama">
                        @error ('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_kegiatan">Nama Kegiatan</label> 
                        <input type="text" name="nama_kegiatan" value="{{ $laporan->kegiatan->nama_kegiatan }}" class="form-control @error('nama_kegiatan') is-invalid @enderror" 
                        id="nama_kegiatan" placeholder="Masukkan Nama Kegiatan">
                        @error ('nama_kegiatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jmlh_pemasukan">Jumlah Pemasukkan</label> 
                        <input type="text" name="jmlh_pemasukan" value="{{ $laporan->jmlh_pemasukan}}" class="form-control @error('jmlh_pemasukan') is-invalid @enderror" 
                        id="jmlh_pemasukan" placeholder="Masukkan Jumlah Pemasukan">
                        @error ('jmlh_pemasukan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jmlh_pengeluaran">Jumlah Pengeluaran</label> 
                        <input type="text" name="jmlh_pengeluaran" value="{{ $laporan->jmlh_pengeluaran}}" class="form-control @error('jmlh_pengeluaran') is-invalid @enderror" 
                        id="jmlh_pengeluaran" placeholder="Masukkan Jumlah Pengeluaran">
                        @error ('jmlh_pengeluaran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal</label> 
                        <input type="date" name="tanggal" value="{{ $laporan->tanggal }}" class="form-control @error('tanggal') is-invalid @enderror" 
                        id="tanggal">
                        @error ('tanggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect">Jenis Organisasi</label>
                        <select name="organisasi_id" value="{{ $laporan->organisasi_id }}" class="form-control @error('organisasi_id') is-invalid @enderror" 
                        id="exampleFormControlSelect">
                            <option value="1" @if($laporan->organisasi_id == "1") selected @endif>Sekaa Teruna</option>
                            <option value="2" @if($laporan->organisasi_id == "2") selected @endif>Sekaa Gong</option>
                            <option value="3" @if($laporan->organisasi_id == "3") selected @endif>Sekaa Santi</option>
                            <option value="4" @if($laporan->organisasi_id == "4") selected @endif>PKK</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label> 
                        <input type="text" name="keterangan" value="{{ $laporan->keterangan }}" class="form-control @error('keterangan') is-invalid @enderror" 
                        id="keterangan" placeholder="Masukkan Keterangan">
                        @error ('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">
</div>

@endsection
            
           
    