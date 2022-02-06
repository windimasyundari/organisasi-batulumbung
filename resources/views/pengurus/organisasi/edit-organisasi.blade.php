@extends('layouts.main-pengurus')

@section('title', 'Edit Data Organisasi')

@section('content')

<div class="page-wrapper">

    <!-- Edit Organisasi -->
    <!-- Modal -->
    <div class="modal fade" id="editOrganisasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editOrganisasiLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOrganisasiLabel">Form Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/pengurus/organisasi/edit-organisasi" style="width:100%">
                    @csrf
                        <div class="form-group">
                            <label for="jenis">Jenis Organisasi</label> 
                            <input type="text" name="jenis" value="{{ $organisasi->jenis }}" class="form-control @error('jenis') is-invalid @enderror" 
                            id="jenis" placeholder="Masukkan Jenis Organisasi">
                            @error ('jenis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div> <br/>
                        <div class="form-group">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection