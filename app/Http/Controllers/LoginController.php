<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengurus;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
// use Auth;

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
    }
    public function dashboardPengurus()
    {
        return view('pengurus/dashboard');
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
