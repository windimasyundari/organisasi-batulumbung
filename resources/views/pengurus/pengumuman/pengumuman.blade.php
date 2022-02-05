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
                   <!--  <a href="/pengurus/pengumuman/create-pengumuman" class="btn btn-primary"><i class="bi bi-plus-lg"></i> TAMBAH</a>
                    @if (session('status'))
                        <div class="alert alert-success mt-3">
                            {{ session('status') }}
                        </div>
                    @endif -->

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
                                     <form method="post" action="/pengurus/pengumuman/pengumuman" style="width:100%"
                                        enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group">
                                                <label for="judul">Judul</label> 
                                                <input type="text" name="judul" value="{{ old ('judul') }}" class="form-control @error('judul') is-invalid @enderror" 
                                                id="judul" placeholder="Masukkan Judul">
                                                @error ('judul')
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
                                                <label for="waktu">waktu</label> 
                                                <input type="time" name="waktu" value="{{ old ('waktu') }}" class="form-control @error('waktu') is-invalid @enderror" 
                                                id="waktu">
                                                @error ('waktu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="isi" class="form-label">Isi Pengumuman</label>
                                                <input type="text" name="isi" value="{{ old ('isi') }}" class="form-control @error('isi') is-invalid @enderror" 
                                                id="isi" placeholder="Masukkan Isi">
                                                @error ('isi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="file" class="form-label">File</label>
                                                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" 
                                                id="file">
                                                @error ('file')
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

                        Halaman : {{ $pengumuman->currentPage() }} <br>
                        Total Data :{{ $pengumuman->total() }} <br/>
                        Data Per Halaman : {{ $pengumuman->perPage() }} <br/> <br>

                        {{  $pengumuman->links()}}
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection