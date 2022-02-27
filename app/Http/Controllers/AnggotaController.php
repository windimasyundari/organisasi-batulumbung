<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class AnggotaController extends Controller
{
    public function SekaaTeruna()
    {
        $anggota = Anggota::where('organisasi_id', '1')->paginate(10);
        return view('pengurus/anggota/sekaa-teruna', compact('anggota'));
    }

    public function SekaaGong()
    {
        $anggota = Anggota::where('organisasi_id', '2')->paginate(10);
        return view('pengurus/anggota/sekaa-gong', compact('anggota'));
    }

    public function SekaaSanti()
    {
        $anggota = Anggota::where('organisasi_id', '3')->paginate(10);
        return view('pengurus/anggota/sekaa-santi', compact('anggota'));
    }

    public function PKK()
    {
        $anggota = Anggota::where('organisasi_id', '4')->paginate(10);
        return view('pengurus/anggota/pkk', compact('anggota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSekaaTeruna(Request $request)
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
        
        return redirect('/anggota/sekaa-teruna')-> with('success', 'Data Anggota Berhasil Ditambahkan!');
    }

    public function storeSekaaGong(Request $request)
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
        
        return redirect('/anggota/sekaa-gong')-> with('success', 'Data Anggota Berhasil Ditambahkan!');
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
        
        return redirect('/anggota/sekaa-santi')-> with('success', 'Data Anggota Berhasil Ditambahkan!');
    }

    public function storePKK(Request $request)
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
        
        return redirect('/anggota/pkk')-> with('success', 'Data Anggota Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function showSekaaTeruna(Anggota $anggota)
    {
        return view('pengurus.anggota.show-sekaateruna', compact('anggota'));
    }

    public function showSekaaGong(Anggota $anggota)
    {
        return view('pengurus.anggota.show-sekaagong', compact('anggota'));
    }

    public function showSekaaSanti(Anggota $anggota)
    {
        return view('pengurus.anggota.show-sekaasanti', compact('anggota'));
    }

    public function showPKK(Anggota $anggota)
    {
        return view('pengurus.anggota.show-pkk', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function updateSekaaTeruna(Request $request, Anggota $anggota)
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
        
        return redirect('/anggota/sekaa-teruna')-> with('success', 'Data Anggota Berhasil Diubah!');
    }

    public function updateSekaaGong(Request $request, Anggota $anggota)
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
        
        return redirect('/anggota/sekaa-gong')-> with('success', 'Data Anggota Berhasil Diubah!');
    }

    public function updateSekaaSanti(Request $request, Anggota $anggota)
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
        
        return redirect('/anggota/sekaa-santi')-> with('success', 'Data Anggota Berhasil Diubah!');
    }

    public function updatePKK(Request $request, Anggota $anggota)
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
        
        return redirect('/anggota/pkk')-> with('success', 'Data Anggota Berhasil Diubah!');
    }

    public function cariSekaaTeruna(Request $request)
	{
		return view('pengurus/anggota/sekaa-teruna', [
            "active" => "anggota", 
            "anggota" => Anggota::latest()->filter(request(['cariSekaaTeruna', 'jenis']))->paginate(10)->withQueryString()
        ]);
	}
    
    public function cariSekaaGong(Request $request)
	{
        return view('pengurus/anggota/sekaa-gong', [
            "active" => "anggota", 
            "anggota" => Anggota::latest()->filter(request(['cariSekaaGong', 'jenis']))->paginate(10)->withQueryString()
        ]);
    }
    
    public function cariSekaaSanti(Request $request)
	{
		return view('pengurus/anggota/sekaa-santi', [
            "active" => "anggota", 
            "anggota" => Anggota::latest()->filter(request(['cariSekaaSanti', 'jenis']))->paginate(10)->withQueryString()
        ]);
    }
    
    public function cariPKK(Request $request)
    {
        return view('pengurus/anggota/PKK', [
            "active" => "anggota", 
            "anggota" => Anggota::latest()->filter(request(['cariPKK', 'jenis']))->paginate(10)->withQueryString()
        ]);
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

        return redirect('/anggota/sekaa-teruna')-> with('status', 'Data Anggota Berhasil Dihapus!');
    }

    public function destroySekaaGong(Anggota $anggota)
    {
        Anggota::destroy($anggota -> id);

        return redirect('/anggota/sekaa-gong')-> with('status', 'Data Anggota Berhasil Dihapus!');
    }

    public function destroySekaaSanti(Anggota $anggota)
    {
        Anggota::destroy($anggota -> id);

        return redirect('/anggota/sekaa-santi')-> with('status', 'Data Anggota Berhasil Dihapus!');
    }

    public function destroy(Anggota $anggota)
    {
        Anggota::destroy($anggota -> id);

        return redirect('/anggota/pkk')-> with('status', 'Data Anggota Berhasil Dihapus!');
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

