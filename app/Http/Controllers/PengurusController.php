<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use App\Models\Organisasi;
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
    public function index(Request $request)
    {
        $pengurus = Pengurus::paginate(10);
        $organisasi = Organisasi::all();

        return view('pengurus.pengurus-crud.pengurus', compact(['pengurus', 'organisasi']));
    }

    public function cariPengurus(Request $request)
	{
        // dd($request->jenis);
        $organisasi = Organisasi::all();
        $pengurus = Pengurus::latest()->filter(request(['cariPengurus', 'jenis']))->paginate(10)->withQueryString();
       
		return view('pengurus/pengurus-crud/pengurus', compact('organisasi', 'pengurus'));
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
            'nama'            => $request->nama,
            'jabatan'         => $request->jabatan,
            'email'           => $request->email,         
            'password'        => Hash::make($request->password),
            'no_telp'         => $request->no_telp,
            'jenis_kelamin'   => $request->jenis_kelamin,
            'alamat'          => $request->alamat,
            'organisasi_id'   => $request->organisasi_id,
            'status'          => $request->status
        ]); 

        return redirect('/pengurus-crud/pengurus')-> with('success', 'Data Pengurus Berhasil Ditambahkan!');
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
        $id = $request->session()->get('idlogin');
        $pengurus = Pengurus::where('id', $id)->get(); 
        
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
                ->update($validateData);

            return redirect('/pengurus-crud/pengurus')-> with('success', 'Data Pengurus Berhasil Diubah!');
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
                    'jabatan'       => $requese->jabatan,
                    'email'         => $request->email,
                    'no_telp'       => $request->no_telp,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'alamat'        => $request->alamat,
                    'organisasi_id' => $request->organisasi_id,
                    'status'        => $request->status,
                ]);

            return redirect('/pengurus-crud/profil-pengurus')-> with('success', 'Data Pengurus Berhasil Diubah!');
    }


    public function updatePassword(Request $request)
    {
        $gantipass = bcrypt($request->passwordbaru);

        //panggil id session yang login
        $id = $request->session()->get('idlogin');

        //cek password yang di db sesuai dengan id yg login
        $cekpassdb = Pengurus::where('id', $id)->value('password');

        if( $gantipass == $cekpassdb || $request->password == $request->konfirmpassword)
        {
            $request->validate([
                'password'        => 'required|min:5|max:8',
                'konfirmpassword' => 'required|min:5|max:8'
            ]);

            Pengurus::where('id', $id)->update([
                'password' => bcrypt($request->password)
            ]);
            return redirect('/pengurus/login')->with('success', 'Password Berhasil Diubah!');
        }
        else
        {
            return back()->with('status', 'Gagal Ubah Password!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengurus $pengurus)
    {
        Pengurus::destroy($pengurus->id);

        return redirect('/pengurus-crud/pengurus')-> with('status', 'Data Pengurus Berhasil Dihapus!');
    }
}
