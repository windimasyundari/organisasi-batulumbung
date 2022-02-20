@extends('layouts.main-pengurus')

@section('title', 'Profil')

@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Profil</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <table class="table table-light table-borderless">
        @foreach($pengurus as $pengurus)
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
            @endforeach
        </table>
        <div>
            <a href="{{ $pengurus->id }}/edit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfil">Edit Profil</a>
            <a href="{{ $pengurus->id}}/edit-password" class="btn btn-danger text-light" data-bs-toggle="modal" data-bs-target="#editPassword">Edit Password</a>
        </div>
    </div>

        <!-- Edit Profil -->
        <!-- Modal -->
        <div class="modal fade" id="editProfil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editProfilLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProfilLabel">Form Edit Profil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="/pengurus-crud/profil-pengurus/{{ $pengurus->id }}" style="width:100%">
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
                            <select name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" id="exampleFormControlSelect">
                                <option value="Ketua" @if($pengurus->jabatan == "Ketua") selected @endif>Ketua</option>
                                <option value="Wakil Ketua" @if($pengurus->jabatan == "Wakil Ketua") selected @endif>Wakil Ketua</option>
                                <option value="Sekretaris"  @if($pengurus->jabatan == "Sekretaris") selected @endif>Sekretaris</option>
                                <option value="Bendahara"  @if($pengurus->jabatan == "Bendahara") selected @endif>Bendahara</option>
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
                                <option value="Laki-Laki" @if($pengurus->jenis_kelamin == "Laki-Laki") selected @endif>Laki-Laki</option>
                                <option valie="Perempuan" @if($pengurus->jenis_kelamin == "Perempuan") selected @endif>Perempuan</option>
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
                                <option value="1" @if($pengurus->organisasi_id == "1") selected @endif>Sekaa Teruna</option>
                                <option value="2" @if($pengurus->organisasi_id == "2") selected @endif>Sekaa Gong</option>
                                <option value="3" @if($pengurus->organisasi_id == "3") selected @endif>Sekaa Santi</option>
                                <option value="4" @if($pengurus->organisasi_id == "4") selected @endif>PKK</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect">Status</label>
                            <select name="status" value="{{ $pengurus->status }}" class="form-control @error('status') is-invalid @enderror" 
                            id="exampleFormControlSelect">
                                <option value="Aktif" @if($pengurus->status == "Aktif") selected @endif>Aktif</option>
                                <option value="Tidak Aktif" @if($pengurus->status == "Tidak Aktif") selected @endif>Tidak Aktif</option>
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

        <!-- Edit Password -->
        <!-- Modal -->
        <div class="modal fade" id="editPassword" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editPasswordLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPasswordLabel">Form Edit Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">

                    <form method="POST" action="/pengurus-crud/profil-pengurus/{{ $pengurus->id }}">
                    @method('patch')
                    @csrf

                    <div class="form-group row">
                        <label for="passwordlama" class="col-md-4 col-form-label text-md-right">{{ __('Password Lama') }}</label>

                        <div class="col-md-6">
                            <input id="passwordlama" type="password" class="form-control @error('passwordlama') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="passwordbaru" class="col-md-4 col-form-label text-md-right">{{ __('Password Baru') }}</label>

                        <div class="col-md-6">
                            <input id="passwordbaru" type="password" class="form-control @error('passwordbaru') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="konfirm-password" class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi Password') }}</label>

                        <div class="col-md-6">
                            <input id="confirm-password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="button" class="btn btn-danger text-light" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>            



@endsection