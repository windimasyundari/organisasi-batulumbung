@extends('layouts.main-pengurus')

@section('title', 'Kegiatan')

@section('content')
<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Daftar Kegiatan</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                <form class="form mb-3" method="get" action="{{ route ('cariKegiatan') }}">
                    <div class="col-md-6">
                        <input type="text" name="cariKegiatan" class="form-control w-75 d-inline" id="cariKegiatan" placeholder="Cari Nama Kegiatan ...">
                        <button type="submit" class="btn btn-primary mb-1"><i class="fa fa-search"></i> Cari</button>  
                    </div>                    
                </form>

                <!-- Tambah Data -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahData">
                Tambah Data
                </button>

                    @if (session('status'))
                    <div class="alert alert-success mt-3">
                        {{ session('status') }}
                    </div>
                    @elseif (session('alert'))
                    <div class="alert alert-danger mt-3">
                        {{ session('alert') }}
                    </div>
                @endif

                <!-- Modal -->
                <div class="modal fade" id="tambahData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahDataLabel">Form Tambah Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="/pengurus/kegiatan/kegiatan" enctype="multipart/form-data" style="width:100%">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama_kegiatan">Nama Kegiatan</label> 
                                        <input type="text" name="nama_kegiatan" value="{{ old ('nama_kegiatan') }}" class="form-control @error('nama_kegiatan') is-invalid @enderror" 
                                        id="nama_kegiatan" placeholder="Masukkan Nama Kegiatan">
                                        @error ('nama_kegiatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="tanggal">Tanggal</label> 
                                        <input type="date" name="tanggal" value="{{ old ('tanggal') }}" class="form-control @error('tanggal') is-invalid @enderror" 
                                        id="tanggal" placeholder="Masukkan Tanggal">
                                        @error ('tanggal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="waktu" class="form-label">Waktu</label>
                                        <input type="time" name="waktu" value="{{ old ('waktu') }}" class="form-control @error('waktu') is-invalid @enderror" 
                                        id="waktu" placeholder="Masukkan Waktu">
                                        @error ('waktu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="tempat" class="form-label">Tempat</label>
                                        <input type="textarea" name="tempat" value="{{ old ('tempat') }}" class="form-control @error('tempat') is-invalid @enderror" 
                                        id="tempat" placeholder="Tempat">
                                        @error ('tempat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <input type="deskripsi" name="deskripsi" value="{{ old ('deskripsi') }}" class="form-control @error('deskripsi') is-invalid @enderror" 
                                        id="deskripsi" placeholder="Masukkan Deskripsi Kegiatan">
                                        @error ('deskripsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" 
                                        id="image">
                                        @error ('image')
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


                <div class="table-responsive mt-3">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">NO</th>
                                <th class="border-top-0">ID KEGIATAN</th>
                                <th class="border-top-0">NAMA KEGIATAN</th>
                                <th class="border-top-0">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($kegiatan as $kegiatans)
                            <tr>
                                <th scope="row">{{ $loop->iteration}}</th>
                                <td>{{$kegiatans->id}}</td>
                                <td>{{$kegiatans->nama_kegiatan}}</td>
                                <td><a href="\kegiatan\kegiatan\{{ $kegiatans->id }}" class="btn btn-primary"><i class="bi bi-eye-fill m-r-5"></i>Detail</a></td>
                            </tr>
                            @empty
                            <td colspan="4" class="table-active text-center">Tidak Ada Data</td>
                        @endforelse
                        </tbody>
                    </table>

                        
                    Halaman : {{ $kegiatan->currentPage() }} <br>
                    Total data :{{ $kegiatan->total() }} <br/>
                    Data Per Halaman : {{ $kegiatan->perPage() }} <br/> <br>

                    {{  $kegiatan->links()}}
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection