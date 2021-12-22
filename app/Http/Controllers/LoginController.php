<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use Illuminate\Support\Facades\Hash;
use Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengurus.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prosesLogin(Request $request)
    {
        //login anggota
        $emaillogin = Anggota::where('email', $request->email)->first();
        // dd($emaillogin->password);

        if(!$emaillogin)
        {
            dd('email salah');
            return redirect()->back()->with('status', 'Email salah');
        }

        $passwordanggota = Hash::check($request->password, $emaillogin->password);

        if(!$passwordanggota)
        {
            dd('password salah');
            return redirect()->back()->with('status', 'Password salah');
        }

        $loginanggota = Auth::guard('anggota')->attempt(['email' => $request->email, 'password' => $request->password]);
        $id = Anggota::where('email', $request->email)->value('id');  
                session([
                    'idlogin' => $id,
                    // 'namalogin' => $tampilnama, 
                ]);
        
        if($loginanggota)
        {
            $request->session()->regenerate();
            return redirect()->intended('/pengurus/dashboard');
        }
        else
        {
            return redirect()->back()->with('status', 'Akun tidak terdaftar');
        }

    }

    public function dashboardAnggota()
    {
        return view('pengurus/dashboard');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
