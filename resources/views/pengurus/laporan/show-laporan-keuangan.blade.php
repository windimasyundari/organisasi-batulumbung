@extends('layouts.main-pengurus')

@section('title', 'Detail Data Laporan Kegiatan')

@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Detail Laporan Kegiatan</h4>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <table class="table table-light table-borderless">
            <tr>
                <th width ="200px ">Jumlah Pemasukan</th>
                <td>{{ $laporan_keuangan->jmlh_pemasukan }}</td>
            </tr>

            <tr>
                <th>Jumlah Pengeluaran</th>
                <td>{{ $laporan_keuangan->jmlh_pengeluaran }</td>
            </tr>

            <tr>
                <th> Tanggal</th>
                <td>{{ $laporan_keuangan->tanggal }</td>
            </tr>

            <tr>
                <th> Jenis Organisasi</th>
                <td>{{ $laporan_keuangan->organisasi->jenis }</td>
            </tr>

            <tr>
                <th>Keterangan</th>
                <td>{{ $laporan_keuangan->keterangan }</td>
            </tr>

            <tr>
                <th>Nama Pengurus</th>
                <td>{{ $laporan_keuangan->pengurus->nama }</td>
            </tr>

            <tr>
                <th> Nama Kegiatan</th>
                <td>{{ $laporan_keuangan->kegiatan->nama_kegiatan }</td>
            </tr>
        </table>

        <a href ="{{ $laporan_keuangan->id }}/edit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editData">Edit</a>
      
        <form action="{{ $laporan_keuangan->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger text-light"><i class="bi bi-trash-fill"></i></button>
        </form>    

        <span class="btn btn-success"><a href="/laporan/laporan-keuangan" class="card-link text-light">Kembali</a></span>
    </div>
      <!-- Modal Edit -->
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
</div>

@endsection
            
           
    