<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengurus = Pengurus::paginate(10);
        return view('pengurus.pengurus-crud.pengurus', compact('pengurus'));
    }

    public function cariPengurus(Request $request)
	{
		// menangkap data pencarian
		$cariPengurus = $request->cariPengurus;
 
    	// mengambil data dari table absensi sesuai pencarian data
		// $pengurus = DB::table('pengurus')
		// ->where('nama','like',"%".$cariPengurus."%")
        // ->paginate(10);
        $pengurus = Pengurus::where('nama', 'like', "%" .$cariPengurus ."%")->paginate(10);
 
    	// mengirim data pengurus ke view index
		return view('pengurus/pengurus-crud/pengurus', ['pengurus' => $pengurus]);
 
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

        Pengurus::create([
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
        return view('pengurus.pengurus-crud.show-pengurus', compact('pengurus'));
    }

    public function profil(Request $request)
    {
        // dd(Auth::id());
        // dd($iduser);
        // $pengurus = Auth::user()->$id;
        $id = $request->session()->get('idlogin');
        $pengurus = Pengurus::where('id', $id)->get(); 
        // dd($pengurus);
        return view('pengurus.pengurus-crud.profil-pengurus', ['pengurus' => $pengurus]);
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
        $validateData = $request->validate([
            'nama'          => 'required',
            'jabatan'       => 'required',
            'email'         => 'required',
            'no_telp'       => 'required',
            'jenis_kelamin' => 'required',
            'alamat'        => 'required',
            'organisasi_id' => 'required',
            'status'        => 'required',
        ]);
        
        Pengurus::where('id', $pengurus->id)
                ->update([
                    'nama'          => $request->nama,
                    'jabatan'       => $request->jabatan,
                    'email'         => $request->email,
                    'no_telp'       => $request->no_telp,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'alamat'        => $request->alamat,
                    'organisasi_id' => $request->organisasi_id,
                    'status'        => $request->status
                ]);

            return redirect('/pengurus-crud/pengurus')-> with('status', 'Data Pengurus Berhasil Diubah!');
    }

    public function updateProfil(Request $request, Pengurus $pengurus)
    {
        $validateData = $request->validate([
            'nama'          => 'required',
            'jabatan'       => 'required',
            'email'         => 'required',
            'no_telp'       => 'required',
            'jenis_kelamin' => 'required',
            'alamat'        => 'required',
            'organisasi_id' => 'required',
            'status'        => 'required',
        ]);
        
        Pengurus::where('id', $pengurus->id)
                ->update([
                    'nama'          => $request->nama,
                    'jabatan'       => $request->jabatan,
                    'email'         => $request->email,
                    'no_telp'       => $request->no_telp,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'alamat'        => $request->alamat,
                    'organisasi_id' => $request->organisasi_id,
                    'status'        => $request->status
                ]);

            return redirect('/pengurus-crud/profil-pengurus')-> with('status', 'Data Pengurus Berhasil Diubah!');
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

        return redirect('/pengurus-crud/pengurus')-> with('alert', 'Data Pengurus Berhasil Dihapus!');
    }
}
