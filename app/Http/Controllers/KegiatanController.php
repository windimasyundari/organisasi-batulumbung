<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan = Kegiatan::all();
        return view('pengurus/kegiatan/kegiatan', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengurus.kegiatan.create-kegiatan');
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
            'deskripsi'     => 'required',
            'image'         => 'image|file|mimes:jpg,jpeg,png|max:1024'
        ]);

        if($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('images-kegiatan');
        }

        Kegiatan::create($validateData);

        // Kegiatan :: create([
        //     'nama_kegiatan' => $request->nama_kegiatan,
        //     'tanggal' => $request->tanggal,
        //     'waktu' => $request->waktu,
        //     'tempat' => $request->tempat,
        //     'deskripsi' => $request->deskripsi,
        //     'image' => $request->image
        // ]); 
        
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
        return view('pengurus.kegiatan.show-kegiatan', compact('kegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan)
    {
        return view('pengurus.kegiatan.edit-kegiatan', compact('kegiatan'));
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
            'deskripsi'     => 'required',
            'image'         => 'required|image|mimes:jpg,jpeg,png|max:1024'
        ]);
        
        if($request->image('image')) {
            $validateData['image'] = $request->image('image')->store('images-kegiatan');
        }

        // $imageName = time().’.’.$request->image->extension();
        // $request->image->move(public_path(‘images’), $imageName);
        
        // // store image in database from here
        // return redirect()->back()->with(‘success’,’Image uploaded successfully.’)->with(‘image’,$imageName);

        Kegiatan::where('id', $kegiatan->id)
                ->update($validateData);

        return redirect('/kegiatan/kegiatan')-> with('status', 'Data Kegiatan Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        Kegiatan::destroy($kegiatan -> id);

        return redirect('/kegiatan/kegiatan')-> with('status', 'Data Kegiatan Berhasil Dihapus!');
    }
}
