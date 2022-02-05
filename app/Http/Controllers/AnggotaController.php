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
    // public function index()
    // {
    //     $anggota = Anggota::paginate(10);
    //     return view('pengurus.anggota.anggota', compact('anggota'));
    // }

    public function SekaaTeruna()
    {
        $anggota = Anggota::where('organisasi_id', '1')->paginate(10);
        return view('pengurus.anggota.sekaa-teruna', compact('anggota'));
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSekaaTeruna()
    {
        return view('pengurus/anggota/sekaa-teruna');
    }

    public function createSekaaGong()
    {
        return view('pengurus/anggota/sekaa-gong');
    }

    public function createSekaaSanti()
    {
        return view('pengurus/anggota/sekaa-santi');
    }

    public function createPKK()
    {
        return view('pengurus/anggota/pkk');
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
            // 'image'           => 'image|file|mimes:jpg,jpeg,png|max:1024',
            'status'          => 'required'
        ]);

        // if($request->file('image')) {
        //     $validateData['image'] = $request->file('image')->store('images-anggota');
        // }

        Anggota::create($validateData);
        
        return redirect('pengurus/anggota/sekaa-teruna')-> with('status', 'Data Anggota Berhasil Ditambahkan!');
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
            // 'image'           => 'image|file|mimes:jpg,jpeg,png|max:1024',
            'status'          => 'required'
        ]);

        // if($request->file('image')) {
        //     $validateData['image'] = $request->file('image')->store('images-anggota');
        // }

        Anggota::create($validateData);
        
        return redirect('pengurus/anggota/sekaa-gong')-> with('status', 'Data Anggota Berhasil Ditambahkan!');
    }

    public function storeSekaaSanti(Request $request)
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
            // 'image'           => 'image|file|mimes:jpg,jpeg,png|max:1024',
            'status'          => 'required'
        ]);
        
        // if($request->file('image')) {
        //     $validateData['image'] = $request->file('image')->store('images-anggota');
        // }

        Anggota::create($validateData);
        
        return redirect('pengurus/anggota/sekaa-santi')-> with('status', 'Data Anggota Berhasil Ditambahkan!');
    }

    public function storePKK(Request $request)
    {
        $validataeData = $request->validate([
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
            // 'image'           => 'image|file|mimes:jpg,jpeg,png|max:1024',
            'status'          => 'required'
        ]);

        // if($request->file('image')) {
        //     $validateData['image'] = $request->file('image')->store('images-anggota');
        // }

        Anggota::create($validateData);
        
        return redirect('pengurus/anggota/pkk')-> with('status', 'Data Anggota Berhasil Ditambahkan!');
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function editSekaaTeruna(Anggota $anggota)
    {
        return view('pengurus/anggota/show-sekaateruna', compact('anggota'));
    }
    public function editSekaaGong(Anggota $anggota)
    {
        return view('pengurus/anggota/show-sekaagong', compact('anggota'));
    }
    public function editSekaaSanti(Anggota $anggota)
    {
        return view('pengurus/anggota/show-sekaasanti', compact('anggota'));
    }
    public function editPKK(Anggota $anggota)
    {
        return view('pengurus/anggota/show-pkk', compact('anggota'));
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
            'password'      => 'required',
            'no_telp'       => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan'     => 'required',
            'alamat'        => 'required',
            'organisasi_id' => 'required',
            // 'image'         => 'image|file|mimes:jpg,jpeg,png|max:1024',
            'status'        => 'required'
        ]);

        // if($request->image('image')) {
        //     $validateData['image'] = $request->image('image')->store('images-anggota');
        // }

        Anggota::where('id', $anggota->id)
        ->update($validateData);
        
        return redirect('pengurus/anggota/sekaa-teruna')-> with('status', 'Data Anggota Berhasil Diubah!');
    }

    public function updateSekaaGong(Request $request, Anggota $anggota)
    {
        $validateData = $request->validate([
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
            // 'image'         => 'image|file|mimes:jpg,jpeg,png|max:1024',
            'status'        => 'required'
        ]);

        // if($request->image('image')) {
        //     $validateData['image'] = $request->image('image')->store('images-anggota');
        // }

        Anggota::where('id', $anggota->id)
        ->update($validateData);
        
        return redirect('/anggota/sekaa-gong')-> with('status', 'Data Anggota Berhasil Diubah!');
    }

    public function updateSekaaSanti(Request $request, Anggota $anggota)
    {
        $validateData = $request->validate([
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
            // 'image'         => 'image|file|mimes:jpg,jpeg,png|max:1024',
            'status'        => 'required'
        ]);

        // if($request->image('image')) {
        //     $validateData['image'] = $request->image('image')->store('images-anggota');
        // }

        Anggota::where('id', $anggota->id)
        ->update($validateData);
        
        return redirect('/anggota/sekaa-santi')-> with('status', 'Data Anggota Berhasil Diubah!');
    }

    public function updatePKK(Request $request, Anggota $anggota)
    {
        $validateData = $request->validate([
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
            // 'image'         => 'image|file|mimes:jpg,jpeg,png|max:1024',
            'status'        => 'required'
        ]);

        // if($request->image('image')) {
        //     $validateData['image'] = $request->image('image')->store('images-anggota');
        // }

        Anggota::where('id', $anggota->id)
        ->update($validateData);
        
        return redirect('/anggota/pkk')-> with('status', 'Data Anggota Berhasil Diubah!');
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
}
