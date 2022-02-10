@extends('layouts.main-pengurus')

@section('title', 'Absensi')

@section('content')
<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Daftar Absensi</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">

                    <form action="/" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="file" name="file" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-primary" type="submit" id="button-addon2">Import</button>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">NO</th>
                                    <th class="border-top-0">ID ANGGOTA</th>
                                    <th class="border-top-0">NAMA ANGGOTA</th>
                                    <th class="border-top-0">NAMA KEGIATAN</th>
                                    <th class="border-top-0">TANGGAL KEGIATAN</th>
                                    <th class="border-top-0">JENIS ORGANISASI</th>
                                    <th class="border-top-0">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                            $no = 0;
                            @endphp
                            @forelse ($absensi as $absensi)
                                <tr>
                                    <th scope="row">{{ ++$no }}</th>
                                    <td>{{$absensi->anggota->anggota_id}}</td>
                                    <td>{{$absensi->anggota->nama}}</td>
                                    <td>{{$absensi->kegiatan->nama_kegiatan}}</td>
                                    <td>{{$absensi->kegiatan->tanggal}}</td>
                                    <td>{{$absensi->organisasi->jenis}}</td>
                                    <td>{{$absensi->status}}</td>
                                    <td><a href="\absensi\absensi\{{ $absensi->id }}" class="btn btn-primary">Detail</a></td>
                                </tr>
                                @empty
                                <td colspan="7" class="table-active text-center">Tidak Ada Data</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection