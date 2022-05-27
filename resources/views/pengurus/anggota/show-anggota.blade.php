@extends('layouts.main-pengurus')

@section('title', 'Detail Data Anggota')

@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Detail Anggota</h4>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <table class="table table-light table-borderless">
            <tr>
                <th width ="200px">ID Anggota</th>
                <td>{{$user->id}}</td>
            </tr>

            <tr>
                <th>Nama</th>
                <td>{{ $user->nama }}</td>
            </tr>

            <tr>
                <th>NIK</th>
                <td>{{ $user->nik }}</td>
            </tr>

            <tr>
                <th>Tempat, Tanggal Lahir</th>
                <td>{{ $user->tempat_lahir }}, {{ $user->tgl_lahir }}</td>
            </tr>
            
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            
            <tr>
                <th>Telp</th>
                <td>{{ $user->no_telp }}</td>
            </tr>
            
            <tr>
                <th>Pekerjaan</th>
                <td>{{ $user->pekerjaan }}</td>
                <td></td>
            </tr>
            
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $user->jenis_kelamin }}</td>
                <td></td>
            </tr>
            
            <tr>
                <th>Alamat</th>
                <td>{{ $user->alamat }}</td>
                <td></td>
            </tr>
            
            <tr>
                <th>Jenis Organisasi</th>
                <td>
                    @foreach( $organisasis as $organisasi)
                        {{ $organisasi->organisasi->jenis }},
                    @endforeach
                </td>
            </tr>
            
            <tr>
                <th>Status</th>
                <td>{{ $user->status }}</td>
                <td></td>
            </tr>
        </table>

        <a href ="{{ $user->id }}/edit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editAnggota">Edit</a>

        <form action="{{ route('hapusUser', $user->id) }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger text-light">Delete</button>
        </form>

        <a href="/anggota/anggota" class="btn btn-success my-3 text-light">Kembali</a>        
       
    </div>

    <!-- Edit Sekaa Teruna -->
    <!-- Modal -->
    <div class="modal fade" id="editAnggota" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editAnggotaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAnggotaLabel">Form Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="post" action="/anggota/anggota/{{ $user->id }}" style="width:100%">
                @method('patch')
                @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label> 
                        <input type="text" name="nama" value="{{ $user->nama }}" class="form-control @error('nama') is-invalid @enderror" 
                        id="nama" placeholder="Masukkan Nama Lengkap">
                        @error ('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label form="nik">NIK</label>
                        <input type="text" name="nik" value="{{ $user->nik }}" class="form-control @error('nik') is-invalid @enderror"
                        id="nik" readonly>
                        @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{ $user->tempat_lahir }}" class="form-control @error('tempat_lahir') is-invalid @enderror" 
                        id="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                        @error ('tempat_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" value="{{ $user->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror" 
                        id="tgl_lahir" placeholder="Tanggal Lahir">
                        @error ('tgl_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" 
                        id="email" placeholder="Masukkan Email">
                        @error ('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect">Jabatan</label>
                        <select name="level" class="form-control @error('level') is-invalid @enderror" id="exampleFormControlSelect">
                            <option value="Ketua" @if($user->level == "Ketua") selected @endif>Ketua</option>
                            <option value="Wakil Ketua" @if($user->level == "Wakil Ketua") selected @endif>Wakil Ketua</option>
                            <option value="Sekretaris"  @if($user->level == "Sekretaris") selected @endif>Sekretaris</option>
                            <option value="Bendahara"  @if($user->level == "Bendahara") selected @endif>Bendahara</option>
                            <option value="Anggota"  @if($user->level == "Anggota") selected @endif>Anggota</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="no_telp" class="form-label">Telp</label>
                        <input type="text" name="no_telp" value="{{ $user->no_telp }}" class="form-control @error('no_telp') is-invalid @enderror" 
                        id="no_telp" placeholder="Masukkan Nomor Telp">
                        @error ('no_telp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect">Jenis Kelamin</label> <br>
                        <input type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-Laki" @if($user->jenis_kelamin == "Laki-Laki") checked @endif> Laki-Laki
                        <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" @if($user->jenis_kelamin == "Perempuan") checked @endif> Perempuan 
                    </div>

                    <div class="form-group">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" name="pekerjaan" value="{{ $user->pekerjaan }}" class="form-control @error('pekerjaan') is-invalid @enderror" 
                        id="pekerjaan" placeholder="Masukkan Pekerjaan">
                        @error ('pekerjaan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="textarea" name="alamat" value="{{ $user->alamat }}" class="form-control @error('alamat') is-invalid @enderror" 
                        id="alamat" placeholder="Masukkan Alamat">
                        @error ('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect">Jenis Organisasi</label> <br>
                        <input type="checkbox" class="check_all" name="organisasi_id" id="sekaateruna" value="1" @if($user->organisasi_id == "1") checked @endif> Sekaa Teruna<br>
                        <input type="checkbox" class="check_all" name="organisasi_id" id="sekaagong" value="2" @if($user->organisasi_id == "2") checked @endif> Sekaa Gong<br>
                        <input type="checkbox" class="check_all" name="organisasi_id" id="sekaasanti" value="3" @if($user->organisasi_id == "3") checked @endif> Sekaa Santi<br>
                        <input type="checkbox" class="check_all" name="organisasi_id" id="pkk" value="4" @if($user->organisasi_id == "4") checked @endif> PKK<br>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect">Status</label>
                        <select name="status" value="{{ $user->status }}" class="form-control @error('status') is-invalid @enderror" 
                        id="exampleFormControlSelect">
                            <option value="1" @if($user->status == "1") selected @endif>Aktif</option>
                            <option value="0" @if($user->status == "0") selected @endif>Tidak Aktif</option>
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

@endsection
            
           
    