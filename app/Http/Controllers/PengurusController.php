<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengurus = Pengurus::get();
        return view('pengurus.pengurus-crud.pengurus', compact('pengurus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengurus/pengurus-crud/pengurus');
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
            'nama'              => 'required',
            'jabatan'           => 'required',
            'email'             => 'required',
            'password'          => 'required|min:5|max:10',
            'konfirmpassword'   => 'required|min:5|max:10',
            'no_telp'           => 'required',
            'jenis_kelamin'     => 'required',
            'alamat'            => 'required',
            'organisasi_id'     => 'required',
            'status'            => 'required'
        ]);

        Pengurus :: create([
            'nama'              => $request->nama,
            'jabatan'           => $request->jabatan,
            'email'             => $request->email,
            'password'          => Hash::make($request->password),
            'no_telp'           => $request->no_telp,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'alamat'            => $request->alamat,
            'organisasi_id'     => $request->organisasi_id,
            'status'            => $request->status
        ]); 

        return redirect('/pengurus-crud/pengurus')-> with('status', 'Data Pengurus Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function show(Pengurus $pengurus)
    {
        return view('pengurus/pengurus-crud/show-pengurus', compact('pengurus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengurus $pengurus)
    {
        return view('pengurus/pengurus-crud/edit-pengurus', compact('pengurus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengurus $pengurus)
    {
        $request->validate([
            'nama'          => 'required',
            'jabatan'       => 'required',
            'email'         => 'required',
            'password'      => 'required',
            'no_telp'       => 'required',
            'jenis_kelamin' => 'required',
            'alamat'        => 'required',
            'organisasi_id' => 'required',
            'status'        => 'required'
        ]);
        
        Pengurus::where('id', $pengurus->id)
                ->update([
                    'nama'          => $request->nama,
                    'jabatan'       => $request->jabatan,
                    'email'         => $request->email,
                    'password'      => $request->password,
                    'no_telp'       => $request->no_telp,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'alamat'        => $request->alamat,
                    'organisasi_id' => $request->organisasi_id,
                    'status'        => $request->status
                ]);

            return redirect('/pengurus/pengurus-crud')-> with('status', 'Data Pengurus Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengurus $pengurus)
    {
        Pengurus::destroy($pengurus -> id);

        return redirect('/pengurus/pengurus-crud')-> with('status', 'Data Pengurus Berhasil Dihapus!');
    }
}
