<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemasukanController extends Controller
{
    public function index()
    {
        $data = DB::table('pemasukan as p')
            ->leftJoin('organisasi as o','p.organisasi_id','=','o.id')
            ->get();
        return view('pengurus.pemasukan.index',compact('data'));
    }

    public function form()
    {
        return view('pengurus.pemasukan.form');
    }
}
