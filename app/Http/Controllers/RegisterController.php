<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $register = Register::all();
        return view('pengurus.register', compact('register'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengurus.register');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => 'Wajib diisi!',
            'min'      => 'Wajib diisi minimal : 5, maksimal : 8  karakter!',
            'max'      => 'Wajib diisi minimal : 5, maksimal : 8 karakter!',
            'unique'   => 'NIK sudah terdaftar'
        ];

        $request->validate([
            'nama'              => 'required',
            'nik'               => 'required',
            'tempat_lahir'      => 'required',
            'tgl_lahir'         => 'required',
            'email'             => 'required',
            'password'          => 'required|min:5|max:10',
            'konfirmpassword'   => 'required|min:5|max:10',
            'no_telp'           => 'required',
            'jenis_kelamin'     => 'required',
            'pekerjaan'         => 'required',
            'alamat'            => 'required',
            'organisasi_id'     => 'required',
            'status'            => 'required'
        ], $message);

        Anggota :: create([
            'nama'              => $request->nama,
            'nik'               => $request->nik,
            'tempat_lahir'      => $request->tempat_lahir,
            'tgl_lahir'         => $request->tgl_lahir,
            'email'             => $request->email,
            'password'          => Hash::make($request->password),
            'no_telp'           => $request->no_telp,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'pekerjaan'         => $request->pekerjaan,
            'alamat'            => $request->alamat,
            'organisasi_id'     => $request->organisasi_id,
            'status'            => $request->status
        ]); 
        
    // dd ($request->all());
        return redirect('/anggota/login')->with('success', 'Registrasi Berhasil!');
    }

}
