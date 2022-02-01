<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use DB;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggota::paginate(10);
        return view('pengurus.anggota.anggota', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSekaaTeruna()
    {
        return view('pengurus.anggota.sekaa-teruna');
    }

    public function createSekaaGong()
    {
        return view('pengurus.anggota.sekaa-gong');
    }

    public function createSekaaSanti()
    {
        return view('pengurus.anggota.sekaa-santi');
    }

    public function createPKK()
    {
        return view('pengurus.anggota.pkk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSekaaTeruna(Request $request)
    {
        $request->validate([
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

        Anggota :: create([
            'nama'          => $request->nama,
            'nik'           => $request->nik,
            'tempat_lahir'  => $request->tempat_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'email'         => $request->email,
            'password'      => $request->password,
            'no_telp'       => $request->no_telp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pekerjaan'     => $request->pekerjaan,
            'alamat'        => $request->alamat,
            'organisasi_id' => $request->organisasi_id,
            'status'        => $request->status
        ]); 
        
        return redirect('pengurus/anggota/sekaa-teruna')-> with('status', 'Data Anggota Berhasil Ditambahkan!');
    }

    public function storeSekaaGong(Request $request)
    {
        $request->validate([
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

        Anggota :: create([
            'nama'          => $request->nama,
            'nik'           => $request->nik,
            'tempat_lahir'  => $request->tempat_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'email'         => $request->email,
            'password'      => $request->password,
            'no_telp'       => $request->no_telp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pekerjaan'     => $request->pekerjaan,
            'alamat'        => $request->alamat,
            'organisasi_id' => $request->organisasi_id,
            'status'        => $request->status
        ]); 
        
        return redirect('pengurus/anggota/sekaa-gong')-> with('status', 'Data Anggota Berhasil Ditambahkan!');
    }

    public function storeSekaaSanti(Request $request)
    {
        $request->validate([
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

        Anggota :: create([
            'nama'          => $request->nama,
            'nik'           => $request->nik,
            'tempat_lahir'  => $request->tempat_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'email'         => $request->email,
            'password'      => $request->password,
            'no_telp'       => $request->no_telp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pekerjaan'     => $request->pekerjaan,
            'alamat'        => $request->alamat,
            'organisasi_id' => $request->organisasi_id,
            'status'        => $request->status
        ]); 
        
        return redirect('pengurus/anggota/sekaa-santi')-> with('status', 'Data Anggota Berhasil Ditambahkan!');
    }

    public function storePKK(Request $request)
    {
        $request->validate([
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

        Anggota :: create([
            'nama'          => $request->nama,
            'nik'           => $request->nik,
            'tempat_lahir'  => $request->tempat_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'email'         => $request->email,
            'password'      => $request->password,
            'no_telp'       => $request->no_telp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pekerjaan'     => $request->pekerjaan,
            'alamat'        => $request->alamat,
            'organisasi_id' => $request->organisasi_id,
            'status'        => $request->status
        ]); 
        
        return redirect('pengurus/anggota/pkk')-> with('status', 'Data Anggota Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        return view('pengurus.anggota.show-anggota', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota $anggota)
    {
        return view('pengurus.anggota.edit-anggota', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'nama'          => 'required',
            'nik'           => 'required',
            'tempat_lahir'  => 'required',
            'tgl_lahir'     => 'required',
            'email'         => 'required',
            'password'      => 'required',
            'no_telp'       => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan'     => 'required',
            'alamat'        => 'required',
            'organisasi_id' => 'required',
            'status'        => 'required'
        ]);
        
        Anggota::where('id', $anggota->id)
                ->update([
                    'nama'          => $request->nama,
                    'nik'           => $request->nik,
                    'tempat_lahir'  => $request->tempat_lahir,
                    'tgl_lahir'     => $request->tgl_lahir,
                    'email'         => $request->email,
                    'password'      => $request->password,
                    'no_telp'       => $request->no_telp,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'pekerjaan'     => $request->pekerjaan,
                    'alamat'        => $request->alamat,
                    'organisasi_id' => $request->organisasi_id,
                    'status'        => $request->status
                ]);

            return redirect('/anggota/anggota')-> with('status', 'Data Anggota Berhasil Diubah!');
    }

    public function cariAnggota(Request $request)
	{
		// menangkap data pencarian
		$cariAnggota = $request->cariAnggota;
 
    	// mengambil data dari table anggota sesuai pencarian data
		$anggota = DB::table('anggota')
		->where('nama','like',"%".$cariAnggota."%")
		->paginate();
 
    	// mengirim data anggota ke view index
		return view('pengurus/anggota/anggota', ['anggota' => $anggota]);
 
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroySekaaTeruna(Anggota $anggota)
    {
        Anggota::where('id', $anggota->id)->delete();

        return redirect('/pengurus/anggota/sekaa-teruna')-> with('status', 'Data Anggota Berhasil Dihapus!');
    }

    public function destroySekaaGong(Anggota $anggota)
    {
        Anggota::destroy($anggota -> id);

        return redirect('/pengurus/anggota/sekaa-gong')-> with('status', 'Data Anggota Berhasil Dihapus!');
    }

    public function destroySekaaSanti(Anggota $anggota)
    {
        Anggota::destroy($anggota -> id);

        return redirect('/pengurus/anggota/sekaa-santi')-> with('status', 'Data Anggota Berhasil Dihapus!');
    }

    public function destroy(Anggota $anggota)
    {
        Anggota::destroy($anggota -> id);

        return redirect('/pengurus/anggota/pkk')-> with('status', 'Data Anggota Berhasil Dihapus!');
    }

    public function SekaaTeruna()
    {
        $anggota = Anggota::where('organisasi_id', '1')->paginate(10);
        return view('/pengurus/anggota/sekaa-teruna', compact('anggota'));
    }

    public function SekaaGong()
    {
        $anggota = Anggota::where('organisasi_id', '2')->paginate(10);
        return view('/pengurus/anggota/sekaa-gong', compact('anggota'));
    }

    public function SekaaSanti()
    {
        $anggota = Anggota::where('organisasi_id', '3')->paginate(10);
        return view('/pengurus/anggota/sekaa-santi', compact('anggota'));
    }

    public function PKK()
    {
        $anggota = Anggota::where('organisasi_id', '4')->paginate(10);
        return view('/pengurus/anggota/pkk', compact('anggota'));
    }
}
