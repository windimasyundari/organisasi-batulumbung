<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumuman = Pengumuman::paginate(10);
        return view('pengurus/pengumuman/pengumuman', compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengurus/pengumuman/pengumuman');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('file')->store('files-pengumuman');

        $validateData = $request->validate([
            'judul'     => 'required|max:255',
            'tanggal'   => 'required',
            'waktu'     => 'required',
            'isi'       => 'required',
            'file'      => 'file|mimes:pdf|max:1024'
        ]);

        if($request->file('file')) {
            $validateData['file'] = $request->file('file')->store('files-pengumuman');
        }

        Pengumuman::create($validateData);
        
        return redirect('/pengumuman/pengumuman')-> with('status', 'Data Pengumuman Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumuman $pengumuman)
    {
        return view('pengurus/pengumuman/show-pengumuman', compact('pengumuman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('pengurus/pengumuman/show-pengumuman', compact('pengumuman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $validateData = $request->validate([
            'judul'     => 'required|max:255',
            'tanggal'   => 'required',
            'waktu'     => 'required',
            'isi'       => 'required',
            'file'      => 'file|mimes:pdf|max:1024'
        ]);

        if($request->file('file')) {
             if($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validateData['file'] = $request->file('file')->store('files-pengumuman');
        }

        Pengumuman::where('id', $pengumuman->id)
                ->update($validateData);
        
        // Pengumuman::where('id', $pengumuman->id)
        //         ->update([
        //             'judul'=>$request->judul,
        //             'tanggal'=>$request->tanggal,
        //             'isi'=>$request->isi,
        //             'file'=>$request->file
        //         ]);

        return redirect('/pengumuman/pengumuman')-> with('status', 'Data Pengumuman Berhasil Diubah!');
    }

    function download($id)
    {
        $file = Pengumuman::where('id', $id)->firstOrFail();
        $pathToFile = public_path('storage/' . $file->file);
        return response()->download($pathToFile, $file->file_name);
    }
       

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        if($pengumuman->file) {
            Storage::delete($pengumuman->file);
        }

        Pengumuman::destroy($pengumuman -> id);

        return redirect('/pengumuman/pengumuman')-> with('alert', 'Data Pengumuman Berhasil Dihapus!');
    }
}
