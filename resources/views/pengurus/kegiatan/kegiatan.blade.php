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
                <form action="{{ route ('filterTanggalKegiatan') }}" method="post">
                @csrf
                    <div class="col-md-6 ms-auto">
                        <div class="input-group mb-3" style="width:590px">
                            <input type="text" class="form-control" name="dari" value="{{ request('dari')}}" onfocusin="(this.type='date')" outfocusin="(this.type='text)" placeholder="Tanggal Awal">
                            <input type="text" class="form-control" name="sampai" value="{{ request('sampai')}}" onfocusin="(this.type='date')" outfocusin="(this.type='text)" placeholder="Tanggal Akhir">
                            <button class="btn btn-primary" type="submit" style="width:80px"> Filter</button>
                        </div>
                    </div>
                </form>
                <form class="form" method="get" action="{{route('cariKegiatan')}}">
                    <div class="col-md-6 ms-auto">
                        <div class="input-group mb-3">
                            <input type="text" name="cari" class="form-control w-75 d-inline" id="cari" value="{{ request('cari')}}" placeholder="Cari Nama Kegiatan ...">
                            <button type="submit" class="btn btn-primary" style="width:80px"><i class="fa fa-search"></i> Cari</button> 
                        </div>
                    </div>                    
                </form>

                <!-- Tambah Data -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahData">
                Tambah Data
                </button>

                 
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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="border-top-0">NO</th>
                                <th class="border-top-0">ID KEGIATAN</th>
                                <th class="border-top-0">NAMA KEGIATAN</th>
                                <th class="border-top-0">TANGGAL</th>
                                <th class="border-top-0">JENIS ORGANISASI</th>
                                <th class="border-top-0">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($kegiatan as $kegiatans)
                            <tr>
                                <th scope="row">{{ $loop->iteration}}</th>
                                <td>{{$kegiatans->id}}</td>
                                <td>{{$kegiatans->nama_kegiatan}}</td>
                                <td>{{$kegiatans->tanggal}}</td>
                                <td>{{$kegiatans->organisasi->jenis}}</td>
                                <td><a href="\kegiatan\kegiatan\{{ $kegiatans->id }}" class="btn btn-primary"><i class="bi bi-eye-fill m-r-5"></i>Detail</a></td>
                            </tr>
                            @empty
                            <td colspan="6" class="table-active text-center">Tidak Ada Data</td>
                        @endforelse
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-end">
                            {{$kegiatan->links()}}
                    </div>
                   
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection