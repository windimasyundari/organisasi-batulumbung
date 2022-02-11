@extends('layouts.main-pengurus')

@section('title', 'Detail Data Pengurus')

@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Detail Pengurus</h4>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <table class="table table-light table-borderless">
            <tr>
                <th width ="200px ">Nama</th>
                <td>{{$pengurus->nama}}</td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td>{{$pengurus->jabatan}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$pengurus->email}}</td>
            </tr>
            <tr>
                <th>No Telp</th>
                <td>{{$pengurus->no_telp}}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{$pengurus->jenis_kelamin}}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{$pengurus->alamat}}</td>
            </tr>
            <tr>
                <th>Jenis Organisasi</th>
                <td>{{$pengurus->organisasi->jenis}}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{$pengurus->status}}</td>
            </tr>
        </table>                
                <a href ="{{ $pengurus->id }}/edit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editPengurus">Edit</a>

                <form action="{{ route('hapusPengurus', $pengurus->id) }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger text-light">Delete</button>
                </form>
                
                <span class="btn btn-success"><a href="/pengurus-crud/pengurus" class="card-link text-light">Kembali</a></span>
            </div>
        </div>

        <!-- Edit Pengurus -->
        <!-- Modal -->
        <div class="modal fade" id="editPengurus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editPengurusLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPengurusLabel">Form Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="/pengurus-crud/pengurus/{{ $pengurus->id }}" style="width:100%">
                    @method('patch')
                    @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label> 
                            <input type="text" name="nama" value="{{ $pengurus->nama }}" class="form-control @error('nama') is-invalid @enderror" 
                            id="nama" placeholder="Masukkan Nama">
                            @error ('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect">Jabatan</label>
                            <select name="jabatan" value="{{ $pengurus->jabatan }}" class="form-control @error('jabatan') is-invalid @enderror" id="exampleFormControlSelect">
                                <option value="">--Pilih--</option>
                                <option value="Ketua">Ketua</option>
                                <option value="Wakil Ketua">Wakil Ketua</option>
                                <option value="Sekretaris">Sekretaris</option>
                                <option value="Bendahara">Bendahara</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" value="{{ $pengurus->email }}" class="form-control @error('email') is-invalid @enderror" 
                            id="email" placeholder="Masukkan Email">
                            @error ('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_telp" class="form-label">No Telp</label>
                            <input type="no_telp" name="no_telp" value="{{ $pengurus->no_telp }}" class="form-control @error('no_telp') is-invalid @enderror" 
                            id="no_telp" placeholder="Masukkan No Telp">
                            @error ('no_telp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect">Jenis Kelamin</label>
                            <select name="jenis_kelamin" value="{{ $pengurus->jenis_kelamin }}" class="form-control @error('jenis_kelamin') is-invalid @enderror" 
                            id="exampleFormControlSelect">
                                <option value="">--Pilih--</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option valie="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="textarea" name="alamat" value="{{ $pengurus->alamat }}" class="form-control @error('alamat') is-invalid @enderror" 
                            id="alamat" placeholder="Masukkan Alamat">
                            @error ('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect">Jenis Organisasi</label>
                            <select name="organisasi_id" class="form-control @error('organisasi_id') is-invalid @enderror" 
                            id="exampleFormControlSelect">
                                <option value="{{ $pengurus->organisasi_id }}"></option>
                                <option value="1">Sekaa Teruna</option>
                                <option value="2">Sekaa Gong</option>
                                <option value="3">Sekaa Santi</option>
                                <option value="4">PKK</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect">Status</label>
                            <select name="status" value="{{ $pengurus->status }}" class="form-control @error('status') is-invalid @enderror" 
                            id="exampleFormControlSelect">
                                <option value="">--Pilih--</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-danger text-light" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
            
           
    