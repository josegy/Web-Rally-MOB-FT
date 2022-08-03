<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class DealerController extends Controller
{
    function dealer()
    {
        $pemain = DB::table('pemain')->get();

        $kartu = DB::table('kartu_pemain as kp')
            ->join('kartu as k', 'kp.kartu_id', '=', 'k.id')
            ->select(DB::raw('k.name as namaKartu'), DB::raw('k.picture as gambar'))
            ->where('kp.pemain_id', '=', 1)
            ->where('kp.kartu_id', '!=', 25)
            ->get();

        return view('dealer.dealer', compact('pemain', 'kartu'));
    }

    function change(Request $request)
    {
        $id = $request->get('id');

        $utuh = DB::table('kartu_pemain as kp')
            ->join('kartu as k', 'kp.kartu_id', '=', 'k.id')
            ->select(DB::raw('k.name as namaKartu'), DB::raw('k.picture as gambar'))
            ->where('kp.pemain_id', '=', $id)
            ->where('kp.kartu_id', '!=', 25)
            ->get();

        $potongan = DB::table('kartu_pemain as kp')
            ->join('kartu as k', 'kp.kartu_id', '=', 'k.id')
            ->select(DB::raw('k.name as namaKartu'), DB::raw('k.picture as gambar'))
            ->where('kp.pemain_id', '=', $id)
            ->where('kp.kartu_id', '=', 25)
            ->get();

        return response()->json(array(
            'utuh' => $utuh,
            'potongan' => $potongan
        ));
    }
}
