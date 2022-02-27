<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan = Kegiatan::paginate(10);
        return view('pengurus/kegiatan/kegiatan', compact('kegiatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validateData = $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal'       => 'required',
            'waktu'         => 'required',
            'tempat'        => 'required',
            'organisasi_id' => 'required',
            'deskripsi'     => 'required',
            'image'         => 'image|file|mimes:jpg,jpeg,png|max:1024'
        ]);

        if($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('images-kegiatan');
        }

        Kegiatan::create($validateData);
        
        return redirect('/kegiatan/kegiatan')-> with('success', 'Data Kegiatan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {   
        // dd($kegiatan);
       
    //    $kegiatan = Kegiatan::find($id);
    //    $kegiatan = Kegiatan::all();
       
        return view('pengurus.kegiatan.show-kegiatan', compact('kegiatan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validateData = $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal'       => 'required',
            'waktu'         => 'required',
            'tempat'        => 'required',
            'organisasi_id' => 'required',
            'deskripsi'     => 'required',
            'image'         => 'required|file|mimes:jpg,jpeg,png|max:1024'
        ]);
        
        // dd($request->file('image')->hashName());
        if($request->file('image')){
            if($request->oldImage) {
                Storage::delete($request->oldImage);
                }
            $validateData['image'] = $request->file('image')->store('images-kegiatan');
           
        }

        Kegiatan::where('id', $kegiatan->id)
                ->update([ 
                    'nama_kegiatan' =>$request->nama_kegiatan,
                    'tanggal'       =>$request->tanggal,
                    'waktu'         =>$request->waktu,
                    'tempat'        =>$request->tempat,
                    'organisasi_id' =>$request->organisasi_id,
                    'deskripsi'     =>$request->deskripsi,
                    'image'         => 'images-kegiatan/'. $request->image->hashName(),
                ]);

        return redirect('/kegiatan/kegiatan')-> with('success', 'Data Kegiatan Berhasil Diubah!');
    }

    public function exportPDF(Request $request, $id) {
        $data = Kegiatan::find($id)->firstOrFail();
        
        // dd($data->nama_kegiatan);

        $pdf = PDF::loadview('pengurus/kegiatan/kegiatan_pdf', compact('data'));
               
        return $pdf->stream('laporan-kegiatan.pdf');
     


        // $kegiatan = Kegiatan::first();
        
        // $nama = Kegiatan::where('id', $kegiatan->id)->value('image');
        // $image = base64_encode(file_get_contents(public_path($nama)));
        // $pdf = PDF::loadView('pengurus/kegiatan/kegiatan_pdf', ['kegiatan' => $kegiatan, 'image' => $image]) 
        // -> stream('laporan-kegiatan.pdf');

        // return view ('/pengurus/kegiatan/kegiatan_pdf', compact('kegiatan'));
        // return $pdf->download('laporan-kegiatan.pdf');
    }

    public function cariKegiatan(Request $request)
	{
		return view('pengurus/kegiatan/kegiatan', [
            "active" => "kegiatan", 
            "kegiatan" => Kegiatan::latest()->filter(request(['cari']))->paginate(10)->withQueryString()
        ]);
 
    }

    public function filterTanggal(Request $request)
    {
      $dari = $request->dari .'.'. '00:00:00';
      $sampai = $request->sampai .'.'. '23:59:59';

      $kegiatan = Kegiatan::whereBetween('tanggal', [$dari, $sampai])->get();

      return view ('/pengurus/kegiatan/kegiatan', ['kegiatan' => $kegiatan, 'dari' => $dari, 'sampai' => $sampai]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        if($kegiatan->image) {
            Storage::delete($kegiatan->image);
        }

        Kegiatan::destroy($kegiatan -> id);

        return redirect('/kegiatan/kegiatan')-> with('status', 'Data Kegiatan Berhasil Dihapus!');
    }

    public function indexAnggota()
    {
        $kegiatan = Kegiatan::paginate(10);
        return view('anggota/kegiatan', [
            "kegiatan" => "All Kegiatan", 
            "kegiatan"=> Kegiatan::latest()->get()
        ]);
    }

    public function cariKegiatanAnggota(Request $request)
	{
		return view('anggota/kegiatan', [
            "active" => "kegiatan", 
            "kegiatan" => Kegiatan::latest()->filter(request(['cari']))->paginate(10)->withQueryString()
        ]);
 
    }

}
