<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PemainController extends Controller
{
    function dashboard()
    {
        $kartu_pemain = DB::table('kartu_pemain as kp')
            ->join('kartu as k', 'kp.kartu_id', '=', 'k.id')
            ->join('pemain as p', 'kp.pemain_id', '=', 'p.id')
            ->select(DB::raw('p.name as namaPemain'), DB::raw('k.name as namaKartu'), 'k.is_full', DB::raw('k.picture as gambar'))
            ->where('p.id', '=', 1)
            ->get();
        
        return view('pemain.pemain', compact('kartu_pemain'));
    }
}
