<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Organisasi;
use App\Models\DetailUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
{
    public function indexAnggota()
    {
        $user = User::where('level', '=', 'Anggota')->paginate(10);
        // $jenis = DetailUser::where('user_id', $user->id)->get();
        $jenis = DetailUser::all();
        $organisasi = Organisasi::all();
     
        return view('pengurus/anggota/anggota', compact(['user', 'organisasi', 'jenis']));
    }

    public function indexPengurus()
    {
        $user = User::where('level', '=', 'Ketua') 
                ->orWhere('level', '=', 'Wakil Ketua')
                ->orWhere('level', '=', 'Sekretaris')
                ->orWhere('level', '=', 'Bendahara')->paginate(10);
        $organisasi = Organisasi::all();
        return view('pengurus/pengurus-crud/pengurus', compact('user', 'organisasi'));
    }

    public function cariAnggota(Request $request)
	{
		$organisasi = Organisasi::all();
        $user = User::where('level', '=', 'Anggota')->filter(request(['cariAnggota', 'jenis']))->paginate(10)->withQueryString();
       
		return view('pengurus/anggota/anggota', compact('organisasi', 'user'));
    }

    public function cariPengurus(Request $request)
	{
		$organisasi = Organisasi::all();
        $user = User::where('level', '=', 'Ketua')
                ->orWhere('level', '=', 'Wakil Ketua')
                ->orWhere('level', '=', 'Sekretaris')
                ->orWhere('level', '=', 'Bendahara')
                ->filter(request(['cariPengurus', 'jenis']))->paginate(10)->withQueryString();
       
		return view('pengurus/pengurus-crud/pengurus', compact('organisasi', 'user'));

    }

    public function storeUser(Request $request)
    {
        // $message = [
        //     'required' => 'Wajib diisi!',
        //     'min'      => 'Wajib diisi minimal : 5, maksimal : 10  karakter!',
        //     'max'      => 'Wajib diisi minimal : 5, maksimal : 10 karakter!',
        //     'unique'   => 'NIK sudah terdaftar'
        // ];

        // $request->validate([
        //     'nama'            => 'required',
        //     'nik'             => 'required|unique',
        //     'tempat_lahir'    => 'required',
        //     'tgl_lahir'       => 'required',
        //     'email'           => 'required|unique',
        //     'password'        => 'required|min:5|max:10',
        //     'konfirmpassword' => 'required|min:5|max:10',
        //     'no_telp'         => 'required',
        //     'jenis_kelamin'   => 'required',
        //     'pekerjaan'       => 'required',
        //     'alamat'          => 'required',
        //     'level'           => 'required',
        //     'status'          => 'required'
        // ], $message);

           
            
        $user = User::create([
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
            'level'           => $request->level,
            'status'          => $request->status
        ]);

        $organisasi = collect($request->organisasi_id);
        $indeks = count($organisasi);
        
        for($i=0;$i<$indeks;$i++){
            DetailUser::create([
                'user_id' => $user->id,
                'organisasi_id' => $organisasi[$i],
            ]);
        }

        if($user->level == "Anggota"){
            return redirect('/anggota/anggota')-> with('success', 'Data Anggota Berhasil Ditambahkan!');
        } 
        else{
            return redirect('/pengurus-crud/pengurus')-> with('success', 'Data Pengurus Berhasil Ditambahkan!');
        }

        //     @if($users->organisasi->jenis == "Sekaa Teruna")
        //     ST{{$users->id}}   
        
        // @elseif($users->organisasi->jenis == "Sekaa Gong")
        //     SG{{$users->id}}

        // @elseif($users->organisasi->jenis == "Sekaa Santi")
        //     SS{{$users->id}}

        // @else($users->organisasi->jenis == "PKK")
        //     PKK{{$users->id}}
        
        // @endif
        
       
    }

    public function showUser(User $user)
    {
        $organisasis = DetailUser::where('user_id', $user->id)->get();
        if($user->level == "Anggota"){
            return view('pengurus.anggota.show-anggota', compact(['user','organisasis']));
        }else{
            return view('pengurus.pengurus-crud.show-pengurus', compact(['user','organisasis']));
        }
    }

    public function updateUser(Request $request, Usur $user)
    {
        $message = [
            'required' => 'Wajib diisi!',
            'min'      => 'Wajib diisi minimal : 5, maksimal : 10  karakter!',
            'max'      => 'Wajib diisi minimal : 5, maksimal : 10 karakter!',
            'unique'   => 'Data sudah terdaftar'
        ];

        $validateData = $request->validate([
            'nama'          => 'required',
            'nik'           => 'required|unique',
            'tempat_lahir'  => 'required',
            'tgl_lahir'     => 'required',
            'email'         => 'required|unique',
            'no_telp'       => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan'     => 'required',
            'alamat'        => 'required',
            'level'         => 'required',
            'status'        => 'required'
        ], $message);

        User::where('id', $user->id)
        ->update($validateData);

        $organisasi = collect($request->organisasi_id);
        $indeks = count($organisasi);
       
        for($i=0;$i<$indeks;$i++){
            DetailUser::create([
                'user_id' => $user->id,
                'organisasi_id' => $organisasi[$i],
            ]);
            
        }

        if($user->level == "Anggota"){
            return redirect('/anggota/anggota')-> with('success', 'Data Anggota Berhasil Diubah!');
        }
        else{
            return redirect('/pengurus/pengurus')-> with('success', 'Data Pengurus Berhasil Diubah!');
        }
        
        
    }
    
    // public function destroyAnggota(User $user)
    // {
    //     User::where('id', $user->id)->delete();
    //     if($user->level == "Anggota")
    //         return redirect('/anggota/anggota')-> with('status', 'Data Anggota Berhasil Dihapus!');
    //     }
    // }
    
    public function destroyUser(User $user)
    {
        User::where('id', $user->id)->delete();

        if($user->level == "Anggota"){
            return redirect('/anggota/anggota')-> with('status', 'Data Anggota Berhasil Dihapus!');
        }else{
            return redirect('/pengurus-crud/pengurus')-> with('status', 'Data Pengurus Berhasil Dihapus!');
        }
    }

    public function updatePassword(Request $request)
    {
        $gantipass = bcrypt($request->passwordbaru);

        //panggil id session yang login
        $id = $request->session()->get('idlogin');

        //cek password yang di db sesuai dengan id yg login
        $cekpassdb = User::where('id', $id)->value('password');

        if( $gantipass == $cekpassdb || $request->password == $request->konfirmpassword)
        {
            $request->validate([
                'password'        => 'required|min:5|max:8',
                'konfirmpassword' => 'required|min:5|max:8'
            ]);

            User::where('id', $id)->update([
                'password' => bcrypt($request->password)
            ]);
            return redirect('/anggota/login')->with('success', 'Password Berhasil Diubah!');
        }
        else
        {
            return back()->with('status', 'Gagal Ubah Password!');
        }
    }

    public function profilPengurus(Request $request)
    {
        $id = $request->session()->get('idlogin');
        $user = User::where('id', $id)->get(); 
        $jenis = DetailUser::where('user_id', $id)->get();
        
        return view('pengurus.pengurus-crud.profil-pengurus', ['user' => $user, 'jenis' =>$jenis]);
    }

    public function updateProfilAnggota(Request $request, User $user)
    {
        $message = [
            'required' => 'Wajib diisi!',
            'min'      => 'Wajib diisi minimal : 5, maksimal : 10  karakter!',
            'max'      => 'Wajib diisi minimal : 5, maksimal : 10 karakter!',
            'unique'   => 'Data sudah terdaftar'
        ];

        $validateData = $request->validate([
            'nama'          => 'required',
            'tempat_lahir'  => 'required',
            'tgl_lahir'     => 'required',
            'email'         => 'required|unique',
            'no_telp'       => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan'     => 'required',
            'alamat'        => 'required',
            'status'        => 'required'
        ], $message);

        User::where('id', $user->id)
                ->update($validateData);

        $organisasi = collect($request->organisasi_id);
        $indeks = count($organisasi);
        
        for($i=0;$i<$indeks;$i++){
            DetailUser::create([
                'user_id' => $user->id,
                'organisasi_id' => $organisasi[$i],
            ]);
            
        }

        return redirect('/dashboard-anggota')-> with('success', 'Data Berhasil Diubah!');
    }

    public function updateProfilPengurus(Request $request, User $user)
    {
        $message = [
            'required' => 'Wajib diisi!',
            'min'      => 'Wajib diisi minimal : 5, maksimal : 10  karakter!',
            'max'      => 'Wajib diisi minimal : 5, maksimal : 10 karakter!',
            'unique'   => 'Data sudah terdaftar'
        ];

        $validateData = $request->validate([
            'nama'          => 'required',
            'tempat_lahir'  => 'required',
            'tgl_lahir'     => 'required',
            'email'         => 'required|unique',
            'no_telp'       => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan'     => 'required',
            'alamat'        => 'required',
            'status'        => 'required'
        ], $message);

        User::where('id', $user->id)
                ->update($validateData);
        
        $organisasi = collect($request->organisasi_id);
        $indeks = count($organisasi);
        
        for($i=0;$i<$indeks;$i++){
            DetailUser::create([
                'user_id' => $user->id,
                'organisasi_id' => $organisasi[$i],
            ]);
            
        }

        return redirect('pengurus-crud/profil-pengurus')-> with('success', 'Data Berhasil Diubah!');
    }
}

