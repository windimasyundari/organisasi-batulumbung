<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class AnggotaController extends Controller
{
    public function indexAnggota()
    {
        $anggota = Anggota::latest()->paginate(10);
        $organisasi = Organisasi::all();
        return view('pengurus/anggota/anggota', compact('anggota', 'organisasi'));
    }

    public function cariAnggota(Request $request)
	{
		$organisasi = Organisasi::all();
        $anggota = Anggota::latest()->filter(request(['cariAnggota', 'jenis']))->paginate(10)->withQueryString();
       
		return view('pengurus/anggota/anggota', compact('organisasi', 'anggota'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAnggota(Request $request)
    {
        $validateData = $request->validate([
            'nama'            => 'required',
            'nik'             => 'required',
            'tempat_lahir'    => 'required',
            'tgl_lahir'       => 'required',
            'email'           => 'required',
            'password'        => 'required|min:5|max:10',
            'konfirmpassword' => 'required|min:5|max:10',
            'no_telp'         => 'required',
            'jenis_kelamin'   => 'required',
            'pekerjaan'       => 'required',
            'alamat'          => 'required',
            'organisasi_id'   => 'required',
            'status'          => 'required'
        ]);

        Anggota::create([
            'nama'            => $request->nama,
            'nik'             => $request->nik,
            'tempat_lahir'    => $request->tempat_lahir,
            'tgl_lahir'       => $request->tgl_lahir,
            'email'           => $request->email,
            'password'        => Hash::make($request->password),
            'no_telp'         => $request->no_telp,
            'jenis_kelamin'   => $request->jenis_kelamin,
            'pekerjaan'       => $request->pekerjaan,
            'alamat'          => $request->alamat,
            'organisasi_id'   => $request->organisasi_id,
            'status'          => $request->status
        ]);
        
        return redirect('/anggota/anggota')-> with('success', 'Data Anggota Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function showAnggota(Anggota $anggota)
    {
        return view('pengurus.anggota.show-anggota', compact('anggota'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function updateAnggota(Request $request, Anggota $anggota)
    {
        $validateData = $request->validate([
            'nama'          => 'required',
            'nik'           => 'required',
            'tempat_lahir'  => 'required',
            'tgl_lahir'     => 'required',
            'email'         => 'required',
            'no_telp'       => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan'     => 'required',
            'alamat'        => 'required',
            'organisasi_id' => 'required',
            'status'        => 'required'
        ]);

        Anggota::where('id', $anggota->id)
        ->update($validateData);
        
        return redirect('/anggota/anggota')-> with('success', 'Data Anggota Berhasil Diubah!');
    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroyAnggota(Anggota $anggota)
    {
        Anggota::where('id', $anggota->id)->delete();

        return redirect('/anggota/anggota')-> with('status', 'Data Anggota Berhasil Dihapus!');
    }

    public function updatePassword(Request $request)
    {
        $gantipass = bcrypt($request->passwordbaru);

        //panggil id session yang login
        $id = $request->session()->get('idlogin');

        //cek password yang di db sesuai dengan id yg login
        $cekpassdb = Anggota::where('id', $id)->value('password');

        if( $gantipass == $cekpassdb || $request->password == $request->konfirmpassword)
        {
            $request->validate([
                'password'        => 'required|min:5|max:8',
                'konfirmpassword' => 'required|min:5|max:8'
            ]);

            Anggota::where('id', $id)->update([
                'password' => bcrypt($request->password)
            ]);
            return redirect('/anggota/login')->with('success', 'Password Berhasil Diubah!');
        }
        else
        {
            return back()->with('status', 'Gagal Ubah Password!');
        }
    }

    public function updateProfil(Request $request, Anggota $anggota)
    {
        $validateData = $request->validate([
            'nama'          => 'required',
            'nik'           => 'required',
            'tempat_lahir'  => 'required',
            'tgl_lahir'     => 'required',
            'email'         => 'required',
            'no_telp'       => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan'     => 'required',
            'alamat'        => 'required',
            'organisasi_id' => 'required',
            'status'        => 'required'
        ]);

        Anggota::where('id', $anggota->id)
                ->update($validateData);

        return redirect('/dashboard-anggota')-> with('success', 'Data Berhasil Diubah!');
    }
}

