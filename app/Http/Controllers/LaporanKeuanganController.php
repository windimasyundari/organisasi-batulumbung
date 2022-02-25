<?php

namespace App\Http\Controllers;

use App\Models\LaporanKeuangan;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanKeuanganExport;
use Illuminate\Http\Request;
use DB;

class LaporanKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan_keuangan = LaporanKeuangan::paginate(10);
        return view('pengurus.laporan.laporan-keuangan', compact('laporan_keuangan')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('pengurus.laporan.laporan-keuangan');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'jmlh_pemasukan'    => 'required',
            'jmlh_pengeluaran'  => 'required',
            'tanggal'           => 'required',
            'keterangan'        => 'required',
            'kegiatan_id'       => 'required',
            'pengurus_id'       => 'required'
        ]);

        LaporanKeuangan :: create($validateData); 
        
        return redirect('/laporan/laporan-keuangan')-> with('success', 'Data Laporan Keuangan Berhasil Ditambahkan!');
    }

    public function cariTanggal(Request $request)
	{
		// menangkap data pencarian
		$cariTanggal = $request->cariTanggal;
 
    	// mengambil data dari table laporan keuangan sesuai pencarian data
		$laporan_keuangan = DB::table('laporan_keuangan')
		->where('tanggal','like',"%".$cariTanggal."%")
		->paginate(10);
 
    	// mengirim data laporan keuangan ke view index
		return view('pengurus/laporan/laporan-keuangan', ['laporan_keuangan' => $laporan_keuangan]);
 
    }

    public function number_format($angka) {
        $hasil_rupiah = "Rp" . number_format($angka,0,',','.');
	    return $hasil_rupiah;
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
    // public function edit(LaporanKeuangan $laporanKeuangan)
    // {
    //     return view('pengurus.laporan.edit-laporan-keuangan', compact('laporan_keuangan'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LaporanKeuangan  $laporanKeuangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LaporanKeuangan $laporan_keuangan)
    {
        $request->validate([
            'jmlh_pemasukan'    => 'required',
            'jmlh_pengeluaran'  => 'required',
            'tanggal'           => 'required',
            'keterangan'        => 'required',
            'kegiatan_id'       => 'required',
            'pengurus_id'       => 'required'
        ]);
        
        LaporanKeuangan::where('id', $laporan_keuangan->id)
                ->update([
            'jmlh_pemasukan'    => $request->jmlh_pemasukan,
            'jmlh_pengeluaran'  => $request->jmlh_pengeluaran,
            'tanggal'           => $request->tanggal,
            'keterangan'        => $request->keterangan,
            'kegiatan_id'       => $request->kegiatan_id,
            'pengurus_id'       => $request->pengurus_id
            ]);

            return redirect('/laporan/laporan-keuangan')-> with('success', 'Data Laporan Keuangan Berhasil Diubah!');
    }

    public function export_excel()
	{
        $nama_file = 'laporan_keuangan'.date('Y-m-d_H-i-s').'.xlsx';
		return Excel::download(new LaporanKeuanganExport, $nama_file);
    }
    
    // public function exportPDF() {
    //     $laporan_keuangan = LaporanKeuangan::all();
    

    //     $pdf = PDF::loadview('/laporan/laporan-keuangan-pdf', $laporan_keuangan);
               
    //     return $pdf->stream('laporan-keuangan.pdf');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporanKeuangan  $laporanKeuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaporanKeuangan $laporanKeuangan)
    {
        LaporanKeuangan::destroy($laporan_keuangan->id);

        return redirect('/laporan/laporan-keuangan')-> with('status', 'Data Laporan Keuangan Berhasil Dihapus!');
    }

    public function indexAnggota()
    {
        $laporan_keuangan = LaporanKeuangan::paginate(10);
        return view('anggota.laporan-keuangan', compact('laporan_keuangan')); 
    }
}
