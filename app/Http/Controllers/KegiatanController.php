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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('pengurus/kegiatan/kegiatan');
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
            'nama_kegiatan' => 'required',
            'tanggal'       => 'required',
            'waktu'         => 'required',
            'tempat'        => 'required',
            'deskripsi'     => 'required',
            'image'         => 'image|file|mimes:jpg,jpeg,png|max:1024'
        ]);

        if($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('images-kegiatan');
        }

        Kegiatan::create($validateData);
        
        return redirect('/kegiatan/kegiatan')-> with('status', 'Data Kegiatan Berhasil Ditambahkan!');
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    // public function edit(Kegiatan $kegiatan)
    // {
    //     return view('pengurus.kegiatan.show-kegiatan', compact('kegiatan'));
    // }

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
            'deskripsi'     => 'required',
            'image'         => 'required|file|mimes:jpg,jpeg,png|max:1024'
        ]);
        

        if($request->file('image')){
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
         $validateData['image'] = $request->file('image')->store('images-kegiatan');
        }

        Kegiatan::where('id', $kegiatan->id)
                ->update($validateData);

        return redirect('/kegiatan/kegiatan')-> with('status', 'Data Kegiatan Berhasil Diubah!');
    }

    public function exportPDF(Request $request, $id) {
        $data['kegiatan'] = Kegiatan::find($id);

        $pdf = PDF::loadview('pengurus/kegiatan/kegiatan_pdf', $data);
        return $pdf->stream('laporan-kegiatan.pdf');
        dd($data);


        // $kegiatan = Kegiatan::first();
        
        // $nama = Kegiatan::where('id', $kegiatan->id)->value('image');
        // $image = base64_encode(file_get_contents(public_path($nama)));
        // $pdf = PDF::loadView('pengurus/kegiatan/kegiatan_pdf', ['kegiatan' => $kegiatan, 'image' => $image]) 
        // -> stream('laporan-kegiatan.pdf');

        // return view ('/pengurus/kegiatan/kegiatan_pdf', compact('kegiatan'));
        // return $pdf->download('laporan-kegiatan.pdf');
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

        return redirect('/kegiatan/kegiatan')-> with('alert', 'Data Kegiatan Berhasil Dihapus!');
    }
}
