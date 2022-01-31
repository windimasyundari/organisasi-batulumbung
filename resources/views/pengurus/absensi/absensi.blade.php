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

                <form class="form" method="get" action="{{ route ('cariNama') }}">
                    <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                        <input type="text" name="cariNama" class="form-control w-75 d-inline" id="cariNama" placeholder="Masukkan Nama">
                        <!-- <a href="{ route ('cari') }" class="active">
                            <i class="fa fa-search"></i>
                        </a> -->
                        <button type="submit" class="btn btn-primary mb-1"><i class="fa fa-search"></i> Cari</button>  
                    </div>                    
                </form>

                <form class="form" method="get" action="{{ route ('cariTanggal') }}">
                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                        <input type="date" name="cariTanggal" class="form-control w-75 d-inline" id="tanggal" placeholder="Masukkan keyword">
                        <button type="submit" class="btn btn-primary mb-1"> <i class="fa fa-search"></i>Cari</button>
                    </div>
                </form>

                <form class="form" method="get" action="{{ route ('cariOrganisasi') }}">
                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                    <select class="form-select shadow-none">
                        <option>Sekaa Teruna</option>
                        <option>Sekaa Santi</option>
                        <option>Sekaa Gong</option>
                        <option>PKK</option>
                    </select> 
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

                <button type="button" class="btn btn-primary mr-5" target="_blank" data-toggle="modal" data-target="#importExcel">
                    IMPORT ABSENSI
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

        <a href="{{ route ('export_absensi') }}" class="btn btn-success my-3 text-light" target="_blank">EXPORT ABSENSI</a>

                    <div class="table-responsive mt-3">
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
                                <td colspan="8" class="table-active text-center">Tidak Ada Data</td>
                                @endforelse
                            </tbody>
                        </table>  

                        Halaman {{ $absensi->currentPage() }}
                        dari {{ $absensi->total() }} <br/> <br/>
                        <!-- Data Per Halaman : {{ $absensi->perPage() }} <br/> <br> -->

                        {{ $absensi->links() }}                          
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection