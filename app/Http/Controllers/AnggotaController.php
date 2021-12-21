<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggota::all();
        return view('pengurus.anggota.anggota', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengurus.anggota.create-anggota');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'email' => 'required',
            'password' => 'required',
            'no_telp' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'organisasi_id' => 'required',
            'status' => 'required'
        ]);

        Anggota :: create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'email' => $request->email,
            'password' => $request->password,
            'no_telp' => $request->no_telp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'organisasi_id' => $request->organisasi_id,
            'status' => $request->status
        ]); 
        
        return redirect('/anggota/anggota')-> with('status', 'Data Anggota Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        return view('pengurus.anggota.show-anggota', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota $anggota)
    {
        return view('pengurus.anggota.edit-anggota', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'email' => 'required',
            'password' => 'required',
            'no_telp' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'organisasi_id' => 'required',
            'status' => 'required'
        ]);
        
        Anggota::where('id', $anggota->id)
                ->update([
                    'nama'=> $request->nama,
                    'nik'=> $request->nik,
                    'tempat_lahir'=> $request->tempat_lahir,
                    'tgl_lahir'=> $request->tgl_lahir,
                    'email'=> $request->email,
                    'password' => $request->password,
                    'no_telp' => $request->no_telp,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'pekerjaan' => $request->pekerjaan,
                    'alamat' => $request->alamat,
                    'organisasi_id' => $request->organisasi_id,
                    'status' => $request->status
                ]);

            return redirect('/anggota/anggota')-> with('status', 'Data Anggota Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggota $anggota)
    {
        Anggota::destroy($anggota -> id);

        return redirect('/anggota/anggota')-> with('status', 'Data Anggota Berhasil Dihapus!');
    }
}
