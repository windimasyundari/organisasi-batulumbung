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
                <a href ="{{ $pengurus->id }}/edit" class="btn btn-primary">Edit</a>

                <form action="{{ $pengurus->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger text-light">Delete</button>
                </form>
                
                <span class="btn btn-success"><a href="/pengurus/pengurus-crud" class="card-link text-light">Kembali</a></span>
            </div>
        </div>
    </div>
</div>

@endsection
            
           
    