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

                <!-- <form role="search" class="app-search d-none d-md-block me-3" action="{{ route ('cari') }}" method="GET">
                    <input type="text" placeholder="Cari Nama .." value= "{{ old('cari') }}" class=" form-control">
                    <input type="submit" class="btn btn-warning" value="CARI">
                    <a href="{ route ('cari') }" class="active">
                        <i class="fa fa-search"></i>
                    </a>
                </form> -->

                <form class="form" method="get" action="{{ route('cari') }}">
                    <div class="form-group w-100 mb-3">
                        <label for="cari" class="d-block mr-2">Nama</label>
                        <input type="text" name="cari" class="form-control w-75 d-inline" id="cari" placeholder="Masukkan keyword">
                        <!-- <a href="{ route ('cari') }" class="active">
                            <i class="fa fa-search"></i>
                        </a> -->
                        <button type="submit" class="btn btn-primary mb-1">Cari</button>
                        
                    </div>
                    <div class="form-group w-100 mb-3">
                        <label for="tanggal" class="d-block mr-2">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control w-75 d-inline" id="tanggal" placeholder="Masukkan keyword">
                        <!-- <a href="{ route ('tanggal') }" class="active">
                            <i class="fa fa-search"></i>
                        </a> -->
                        <button type="submit" class="btn btn-primary mb-1">Cari</button>
                    </div>
                </form>

              

                {{-- notifikasi form validasi --}}
                @if ($errors->has('file'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('file') }}</strong>
                </span>
                @endif
        
                {{-- notifikasi sukses --}}
                @if ($sukses = Session::get('sukses'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $sukses }}</strong>
                </div>
                @endif

                <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
                    IMPORT EXCEL
                </button>

                <!-- Import Excel -->
                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="/absensi/import_absensi" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                </div>
                                <div class="modal-body">

                            {{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>

        <a href="{{ route ('export_absensi') }}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>

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
                                    <th class="border-top-0">STATUS</th>
                                    <th class="border-top-0">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>

                            <!-- melakukan looping data -->
                            @php
                                $no = 0;
                            @endphp

                            @forelse ($absensi as $absen)
                                <tr>
                                    <th scope="row">{{ ++$no }}</th>
                                    <td>{{$absen->anggota_id}}</td>
                                    <td>{{$absen->nama}}</td>
                                    <td>{{$absen->nama_kegiatan}}</td>
                                    <td>{{ \Carbon\Carbon::parse($absen->tanggal)->format('d/m/Y')}}</td> 
                                    <!-- carbon format (y-m-d) -->
                                    <td>{{$absen->jenis}}</td>
                                    <td>{{$absen->status}}</td>
                                    <td><a href="\absensi\absensi\{{ $absen->id }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a></td>
                                </tr>
                                @empty
                                <td colspan="7" class="table-active text-center">Tidak Ada Data</td>
                                @endforelse
                            </tbody>
                        </table>  
                        {{ $absensi->links() }}                          
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection