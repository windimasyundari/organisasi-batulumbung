<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\Pengurus;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
// use Auth;
=======
use App\Models\Anggota;
use App\Models\Pengurus;
use Illuminate\Support\Facades\Hash;
//use Auth;
use Illuminate\Support\Facades\Auth;
>>>>>>> a8a1275a0a137a3a019fd10478be4d2d1500dc91

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
<<<<<<< HEAD
        $login = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

       if(Auth::attempt($login)) {
           $request->session()->regenerate();

           return redirect()->intended('pengurus/dashboard');
       }

       return back()->with('loginError', 'Login gagal!');

    //    dd('berhasil login!');
=======
        
        //login anggota
        $emaillogin = Anggota::where('email', $request->email)->first();
        // dd($emaillogin->password);

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
           
            return redirect()->intended('/pengurus/dashboard');
        }
        else
        {
            return redirect()->back()->with('status', 'Akun tidak terdaftar');
        }
        //*/
>>>>>>> a8a1275a0a137a3a019fd10478be4d2d1500dc91
    }
    public function dashboardPengurus()
    {
<<<<<<< HEAD
        return view('pengurus/dashboard');
=======
        //$id = $request->session()->get('idlogin');
        //$semua = Anggota::where('id', $id)->get(); 
        return view('/pengurus/dashboard');

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
>>>>>>> a8a1275a0a137a3a019fd10478be4d2d1500dc91
    }

    public function logout()
    {
        if (Auth::guard('pengurus')->check()) {
            Auth::guard('pengurus')->logout();
        } elseif (Auth::guard('pengurus')->check()) {
            Auth::guard('pengurus')->logout();
        }
        return redirect('/');
    }
}
