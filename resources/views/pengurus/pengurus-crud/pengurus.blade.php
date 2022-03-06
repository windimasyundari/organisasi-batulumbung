@extends('layouts.main-pengurus')

@section('title', 'Pengurus')

@section('content')
<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Daftar Pengurus</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                <form class="form mb-3" method="get" action="{{ route ('cariPengurus') }}">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="jenis" id="jenis" class="form-control" onchange="this.form.submit()" >
                                    <option value="" selected>Filter Organisasi</option>
                                    @foreach($organisasi as $organisasis)
                                    <option value="{{$organisasis->jenis}}">{{$organisasis->jenis}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">    
                            <div class="form-group">
                                <input type="text" name="cariPengurus" class="form-control w-75 d-inline" id="cariPengurus" value="{{ request('cariPengurus')}}" placeholder="Cari Nama ...">
                                <button type="submit" class="btn btn-primary mb-1 d-inline"><i class="fa fa-search"></i> Cari</button>
                            </div>  
                        </div>
                    </div>                    
                </form>

             
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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah Data
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                <form method="post" action="{{ route('tambahPengurus')}}" style="width:100%" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group">
                                            <label for="nama">Nama</label> 
                                            <input type="text" name="nama" value="{{ old ('nama') }}" class="form-control @error('nama') is-invalid @enderror" 
                                            id="nama" placeholder="Masukkan Nama">
                                            @error ('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect">Jabatan</label>
                                            <select name="jabatan" value="{{ old ('jabatan') }}" class="form-control" id="exampleFormControlSelect">
                                                <option value="">--Pilih--</option>
                                                <option value="Ketua">Ketua</option>
                                                <option value="Wakil Ketua">Wakil Ketua</option>
                                                <option value="Sekretaris">Sekretaris</option>
                                                <option value="Bendahara">Bendahara</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" name="email" value="{{ old ('email') }}" class="form-control @error('email') is-invalid @enderror" 
                                            id="email" placeholder="Masukkan Email">
                                            @error ('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" value="{{ old ('password') }}" class="form-control @error('password') is-invalid @enderror" 
                                            id="password" placeholder="Masukkan Password">
                                            @error ('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password" class="form-label">Konfirmasi Password</label>
                                            <input type="password" name="konfirmpassword" value="{{ old ('konfirmpassword') }}" class="form-control @error('konfirmpassword') is-invalid @enderror" 
                                            id="konfirmpassword" placeholder="Masukkan Password">
                                            @error ('konfirmpassword')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="no_telp" class="form-label">No Telp</label>
                                            <input type="text" name="no_telp" value="{{ old ('no_telp') }}" class="form-control @error('no_telp') is-invalid @enderror" 
                                            id="no_telp" placeholder="Masukkan No Telp">
                                            @error ('no_telp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" value="{{ old ('jenis_kelamin') }}" class="form-control" id="exampleFormControlSelect">
                                                <option value="">--Pilih--</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option valie="Perempuan">Perempuan</option>
                                            </select>
                                        
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input type="textarea" name="alamat" value="{{ old ('alamat') }}" class="form-control @error('alamat') is-invalid @enderror" 
                                            id="alamat" placeholder="Masukkan Alamat">
                                            @error ('alamat')
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
                                            <label for="exampleFormControlSelect">Status</label>
                                            <select name="status" value="{{ old ('status') }}" class="form-control" id="exampleFormControlSelect">
                                                <option value="">--Pilih--</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                            </select>
                                        </div>
                                        <div class="form-group  " >
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
                                    <th class="border-top-0">ID PENGURUS</th>
                                    <th class="border-top-0">NAMA</th>
                                    <th class="border-top-0">JABATAN</th>
                                    <th class="border-top-0">JENIS ORGANISASI</th>
                                    <th class="border-top-0">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse( $pengurus as $penguruss )
                                <tr>
                                    <th scope="row">{{ $loop->iteration}}</th>
                                    <td>{{$penguruss->id}}</td>
                                    <td>{{$penguruss->nama}}</td>
                                    <td>{{$penguruss->jabatan}}</td>
                                    <td>{{$penguruss->organisasi->jenis}}</td>
                                    <td><a href="\pengurus-crud\pengurus\{{ $penguruss->id }}" class="btn btn-primary"><i class="bi bi-eye-fill m-r-5"></i>Detail</a></td>
                                </tr>
                                @empty
                                <td colspan="6" class="table-active text-center">Tidak Ada Data</td>
                            @endforelse
                          
                            </tbody>
                        </table>

                        <div class="d-flex center-content-end">
                            {{$pengurus->links()}}
                        </div>
                      
                       

                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection