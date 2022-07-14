<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class KartuController extends Controller
{
    function checkPotongan()
    {
        $potongan = DB::table('kartu_pemain as kp')
            ->join('kartu as k', 'kp.kartu_id', '=', 'k.id')
            ->join('pemain as p', 'kp.pemain_id', '=', 'p.id')
            ->select(DB::raw('p.name as namaPemain'), DB::raw('k.name as namaKartu'), 'k.is_full', DB::raw('k.picture as gambar'))
            ->where('p.id', '=', 1)
            ->where('k.name', 'like', '%potongan%')
            ->where('k.is_full', '=', false)
            ->get();

        return response()->json(array([
            'potongan' => $potongan
        ]));
    }

    function tukar(Request $request)
    {
        $pilihan = $request->get('pilihan');

        // kalau pemain pilih 'random'
        if ($pilihan == 'random') {
        }
        // kalau pemain pilih 'pilih'
        else if ($pilihan == 'pilih') {
        }
        // kalau pemain pilih 'spesial'
        else if ($pilihan == 'spesial') {
        }

        return response()->json(array([
            'success' => true
        ]));
    }
}
