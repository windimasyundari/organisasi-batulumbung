<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Organisasi;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AbsensiImport;
use App\Exports\AbsensiExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;


class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absensi = Absensi::latest()->paginate(10);
        $organisasi = Organisasi::all();

        // dd($absensi);
        return view('pengurus.absensi.absensi', compact('absensi', 'organisasi'));
    }

    public function cariAbsensi(Request $request)
    {
        $organisasi = Organisasi::all();
        $absensi = Absensi::latest()->filter(request(['cariAbsensi', 'jenis']))->paginate(10)->withQueryString();

        return view('pengurus/absensi/absensi', compact('organisasi', 'absensi'));
    }

    public function filterTanggal(Request $request)
    {
        $dari = $request->dari . '.' . '00:00:00';
        $sampai = $request->sampai . '.' . '23:59:59';

        if($request->dari == '' && $request->sampai == ''){
            return redirect('absensi/absensi');
        }

        if($request->dari == ''){
            return redirect()->back()->withInput()->with('status', 'Tanggal awal filter harus diisi');
        }

        if($request->sampai == ''){
            return redirect()->back()->withInput()->with('status', 'Tanggal akhir filter harus diisi');
        }
        
        if($request->dari > $request->sampai){
            return redirect()->back()->withInput()->with('status', 'Tanggal awal tidak boleh lebih dari tanggal akhir filter');
        }
        
        $absensi = Absensi::whereBetween('tanggal', [$dari, $sampai])->latest()->paginate(10);
        $organisasi = Organisasi::all();

        return view('/pengurus/absensi/absensi', ['absensi' => $absensi, 'dari' => $request->dari, 'sampai' => $request->sampai, 'organisasi' => $organisasi]);
    }

    // public function cariTanggal(Request $request)
    // {
    // 	// menangkap data pencarian
    // 	$cariTanggal = $request->cariTanggal;

    // 	// mengambil data dari table absensi sesuai pencarian data
    // 	$absensi = DB::table('absensi')
    // 	->where('tanggal','like',"%".$cariTanggal."%")
    // 	->paginate(10);

    // 	// mengirim data absensi ke view index
    // 	return view('pengurus/absensi/absensi', ['absensi' => $absensi]);

    // }


    public function import_excel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_absensi di dalam folder public
        $file->move('files_absensi', $nama_file);
        // import data
        Excel::import(new AbsensiImport, public_path('files_absensi/' . $nama_file));

        // alihkan halaman kembali
        return redirect('/absensi/absensi');
    }

    public function export_excel()
    {
        $nama_file = 'absensi' . date('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new AbsensiExport, $nama_file);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('pengurus.absensi.create-absensi');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'anggota_id' => 'required',
            'nama' => 'required',
            'nama_kegiatan' => 'required',
            'tanggal' => 'required',
            'jenis' => 'required',
            'status' => 'required'
        ]);

        Absensi::create([
            'anggota_id' => $request->anggota_id,
            'nama' => $request->anggota->nama,
            'nama_kegiatan' => $request->kegiatan->nama_kegiatan,
            'tanggal' => $request->kegiatan->tanggal,
            'jenis' => $request->organisasi->jenis,
            'status' => $request->status
        ]);

        return redirect('/absensi/absensi')->with('success', 'Data Absensi Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    // public function show(Absensi $absensi)
    // {
    //     return view('pengurus.absensi.show-absensi', compact('absensi'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    // public function edit(Absensi $absensi)
    // {
    //     return view('pengurus.absensi.edit-absensi', compact('absensi'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
        $request->validate([
            'status' => 'required'
        ]);

        Absensi::where('id', $absensi->id)
            ->update([
                'status' => $request->status
            ]);

        return redirect('/absensi/absensi')->with('success', 'Data Absensi Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        Absensi::destroy($absensi->id);

        return redirect('/absensi/absensi')->with('status', 'Data Absensi Berhasil Dihapus!');
    }

    public function indexAnggota(Request $request)
    {
        // dd(Auth::guard('anggota')->user()->id);
        $absensi = Auth::guard('anggota')->user()->id;
        $data_absensi = Absensi::where('anggota_id', $absensi)
            ->paginate(10);

        return view('anggota.absensi', compact('data_absensi'));
    }
}
