@extends('layouts.main-pengurus')

@section('title', 'Profil {{$pengurus->nama}}')

@section('content')

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



@endsection