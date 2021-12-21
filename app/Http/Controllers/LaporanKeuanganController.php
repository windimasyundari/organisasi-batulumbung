<?php

namespace App\Http\Controllers;

use App\Models\LaporanKeuangan;
use Illuminate\Http\Request;

class LaporanKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan_keuangan = LaporanKeuangan::all();
        return view('pengurus.laporan.laporan-keuangan', compact('laporan_keuangan')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengurus.laporan.create-laporan-keuangan');
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
            'jmlh_pemasukkan' => 'required',
            'jmlh_pengeluaran' => 'required',
            'keterangan' => 'required',
            'kegiatan_id' => 'required',
            'pengurus_id' => 'required'
        ]);

        LaporanKeuangan :: create([
            'jmlh_pemasukkan' => $request->jmlh_pemasukkan,
            'jmlh_pengeluaran' => $request->jmlh_pengeluaran,
            'keterangan' => $request->keterangan,
            'kegiatan_id' => $request->kegiatan_id,
            'pengurus_id' => $request->pengurus_id
        ]); 
        
        return redirect('/laporan/laporan-keuangan')-> with('status', 'Data Laporan Keuangan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaporanKeuangan  $laporanKeuangan
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanKeuangan $laporanKeuangan)
    {
        return view('pengurus.laporan.show-laporan-keuangan', compact('laporan_keuangan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaporanKeuangan  $laporanKeuangan
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporanKeuangan $laporanKeuangan)
    {
        return view('pengurus.laporan.edit-laporan-keuangan', compact('laporan_keuangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LaporanKeuangan  $laporanKeuangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LaporanKeuangan $laporanKeuangan)
    {
        $request->validate([
            'jmlh_pemasukkan' => 'required',
            'jmlh_pengeluaran' => 'required',
            'keterangan' => 'required',
            'kegiatan_id' => 'required',
            'pengurus_id' => 'required'
        ]);
        
        LaporanKeuangan::where('id', $laporan_kegiatan -> id)
                ->update([
                    'jmlh_pemasukkan'=>$request->jmlh_pemasukkan,
                    'jmlh_pengeluaran'=>$request->jmlh_pengeluaran,
                    'keterangan'=>$request->keterangan,
                    'kegiatan_id'=>$request->kegiatan_id,
                    'pengurus_id'=>$request->pengurus_id
                ]);

            return redirect('/laporan.laporan-kegiatan')-> with('status', 'Data Laporan Kegiatan Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporanKeuangan  $laporanKeuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaporanKeuangan $laporanKeuangan)
    {
        Pengumuman::destroy($laporan_keuangan -> id);

        return redirect('/laporan.laporan-keuangan')-> with('status', 'Data Laporan Berhasil Dihapus!');
    }
}
