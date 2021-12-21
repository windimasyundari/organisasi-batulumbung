<?php

namespace App\Http\Controllers;

use App\Models\LaporanKegiatan;
use Illuminate\Http\Request;

class LaporanKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan_kegiatan = LaporanKegiatan::all();
        return view('pengurus.laporan-kegiatan', compact('laporan_kegiatan'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengurus.create-laporan-kegiatan');
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
            'nama_kegiatan' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'tempat' => 'required',
            'foto' => 'required',
            'keterangan' => 'required'
        ]);

        LaporanKegiatan :: create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'tempat' => $request->tempat,
            'foto' => $request->foto,
            'keterangan' => $request->keterangan
        ]); 
        
        return redirect('/laporan-kegiatan')-> with('status', 'Data Laporan Kegiatan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaporanKegiatan  $laporanKegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanKegiatan $laporanKegiatan)
    {
        return view('pengurus.show-laporan-kegiatan', compact('laporan_kegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaporanKegiatan  $laporanKegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporanKegiatan $laporanKegiatan)
    {
        return view('pengurus.edit-laporan-kegiatan', compact('laporan_kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LaporanKegiatan  $laporanKegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LaporanKegiatan $laporanKegiatan)
    {
        $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'tempat' => 'required',
            'foto' => 'required',
            'keterangan' => 'required'
        ]);
        
        LaporanKegiatan::where('id', $laporan_kegiatan -> id)
                ->update([
                    'nama_kegiatan'=>$request->nama_kegiatan,
                    'tanggal'=>$request->tanggal,
                    'waktu'=>$request->waktu,
                    'tempat'=>$request->tempat,
                    'foto'=>$request->foto,
                    'keterangan'=>$request->keterangan
                ]);

            return redirect('/laporan-kegiatan')-> with('status', 'Data Laporan Kegiatan Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporanKegiatan  $laporanKegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaporanKegiatan $laporanKegiatan)
    {
        Pengumuman::destroy($laporan_kegiatan -> id);

        return redirect('/laporan-kegiatan')-> with('status', 'Data Laporan Berhasil Dihapus!');
    }
}
