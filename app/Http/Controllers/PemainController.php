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

        $kartu = DB::table('kartu')
            ->select(DB::raw('name as namaKartu'))
            ->where('id', '<', 21)
            ->get();

        return view('pemain.pemain', compact('kartu_pemain', 'kartu'));
    }

    function changeJenis(Request $request)
    {
        $jenis = $request->get('jenis');

        if ($jenis == 'angka') {
            $data = '<option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>';
        } else if ($jenis == 'simbol') {
            $data = '<option value="keriting">keriting</option>
                    <option value="love">love</option>
                    <option value="wajik">wajik</option>
                    <option value="waru">waru</option>';
        }

        return response()->json(array(
            'data' => $data
        ));
    }
}
