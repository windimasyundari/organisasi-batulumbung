@extends('layouts.main-anggota')

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
        <div class="row ">
            <div class="card bg-purple" style="width: 100rem;">
                <div class="card-body bg-purple">
                    <div class="table-responsive mt-3">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0, text-white">NO</th>
                                    <th class="border-top-0, text-white">ID ANGGOTA</th>
                                    <th class="border-top-0, text-white">NAMA ANGGOTA</th>
                                    <th class="border-top-0, text-white">NAMA KEGIATAN</th>
                                    <th class="border-top-0, text-white">TANGGAL KEGIATAN</th>
                                    <th class="border-top-0, text-white">JENIS ORGANISASI</th>
                                    <th class="border-top-0, text-white">STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- melakukan looping data -->
                            @php
                                $no = 0;
                            @endphp

                            @forelse ($absensi as $absen)
                                <tr class="text-white">
                                    <th scope="row">{{ ++$no }}</th>
                                    <td>{{$absen->anggota_id}}</td>
                                    <td>{{$absen->nama}}</td>
                                    <td>{{$absen->nama_kegiatan}}</td>
                                    <td>{{ \Carbon\Carbon::parse($absen->tanggal)->format('d/m/Y')}}</td> 
                                    <!-- carbon format (y-m-d) -->
                                    <td>{{$absen->jenis}}</td>
                                    <td>{{$absen->status}}</td>
                                </tr>
                                @empty
                                <td colspan="8" class="table-active text-center">Tidak Ada Data</td>
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