<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Pengurus;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPengurus()
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
        $emaillogin = Pengurus::where('email', $request->email)->first();
        // dd($emaillogin);

        if(!$emaillogin)
        {
            //dd('email salah');
            return redirect()->back()->with('status', 'Email salah');
        }

        $passwordpengurus = Hash::check($request->password, $emaillogin->password);

        if(!$passwordpengurus)
        {
            //dd('password salah');
            return redirect()->back()->with('status', 'Password salah');
        }

        $loginpengurus = Auth::guard('pengurus')->attempt(['email' => $request->email, 'password' => $request->password]);
        $id = Pengurus::where('email', $request->email)->value('id');  
                session([
                    'idlogin' => $id,
                    // 'namalogin' => $tampilnama, 
                ]);
        
        if($loginpengurus)
        {
            $request->session()->regenerate();
           
            return redirect()->intended('/pengurus/dashboard');
        }
        // else
        // {
        //     return redirect()->back()->with('status', 'Akun tidak terdaftar');
        // }
        
    }
    
    public function dashboardPengurus(Request $request)
    {
        $id = $request->session()->get('idlogin');
        $semua = Pengurus::where('id', $id)->get(); 

        //hitung
        $sekaateruna = Anggota::where(['organisasi_id' => '1'])->count();
        $sekaagong = Anggota::where(['organisasi_id' => '2'])->count();
        $sekaasanti = Anggota::where(['organisasi_id' => '3'])->count();
        $pkk = Anggota::where(['organisasi_id' => '4'])->count();
        return view('/pengurus/dashboard', compact(['sekaateruna', 'sekaagong', 'sekaasanti', 'pkk']));

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/pengurus/login');
    }

    public function indexAnggota()
    {
        return view('anggota.login');
    }

    public function prosesLoginAnggota(Request $request)
    {
        //login anggota
        $emaillogin = Anggota::where('email', $request->email)->first();
        // dd($emaillogin);

        if(!$emaillogin)
        {
            //dd('email salah');
            return redirect()->back()->with('status', 'Email salah');
        }

        $passwordanggota = Hash::check($request->password, $emaillogin->password);

        if(!$passwordanggota)
        {
            //dd('password salah');
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
           
            return redirect()->intended('/dashboard-anggota');
        }
        // else
        // {
        //     return redirect()->back()->with('status', 'Akun tidak terdaftar');
        // }
        
    }

    public function dashboardAnggota(Request $request)
    {
        $id = $request->session()->get('idlogin');
        $semua = Anggota::where('id', $id)->get(); 

        return view('/anggota/dashboard-anggota', (compact('semua')));

    }

    public function logoutAnggota(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/anggota/login');
    }
    

    
}
