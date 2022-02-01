<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Pengurus;
use Illuminate\Support\Facades\Hash;
//use Auth;
use Illuminate\Support\Facades\Auth;

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

    
}
