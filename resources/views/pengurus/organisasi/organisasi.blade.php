@extends('layouts.main-pengurus')

@section('title', 'Organisasi')

@section('content')
<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Daftar Organisasi</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <span class="btn btn-primary "><a href="/pengurus/organisasi/create-organisasi" style="color:white">Tambah Data</a></span>
                    @if (session('status'))
                        <div class="alert alert-success mt-3">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">NO</th>
                                    <th class="border-top-0">ID ORGANISASI</th>
                                    <th class="border-top-0">JENIS ORGANISASI</th>
                                    <th class="border-top-0">AKSI</th>
                                </tr>
                            </thead>
                            @foreach($organisasi as $organisasis)
                                <tr>
                                    <th scope="row">{{ $loop->iteration}}</th>
                                    <td>{{$organisasis->id}}</td>
                                    <td>{{$organisasis->jenis}}</td>
                                    <td><a href ="/organisasi/{{ $organisasis->id }}/edit" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a> |
                                        <form action="/organisasi/{{ $organisasis->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger text-light"><i class="bi bi-trash-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection