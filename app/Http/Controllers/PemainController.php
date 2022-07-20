<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class PemainController extends Controller
{
    function dashboard()
    {
        $user = Auth::user()->pemain;
        // $kartu_pemain = DB::table('kartu_pemain as kp')
        //     ->join('kartu as k', 'kp.kartu_id', '=', 'k.id')
        //     ->join('pemain as p', 'kp.pemain_id', '=', 'p.id')
        //     ->select(DB::raw('p.name as namaPemain'), DB::raw('k.name as namaKartu'), 'k.is_full', DB::raw('k.picture as gambar'))
        //     ->where('p.id', '=', 1)
        //     ->get();

        $kartu = DB::table('kartu')
            ->select(DB::raw('name as namaKartu'))
            ->where('id', '<', 21)
            ->get();

        $selectKartu = DB::table('kartu_pemain as kp')
            ->join('kartu as k', 'kp.kartu_id', '=', 'k.id')
            ->join('pemain as p', 'kp.pemain_id', '=', 'p.id')
            ->select(DB::raw('p.name as namaPemain'), DB::raw('k.name as namaKartu'), 'k.is_full', DB::raw('k.picture as gambar'))
            ->where('k.is_full', '=', true)
            ->where('p.id', '=', $user->id)
            ->get();

        $utuh = DB::table('kartu_pemain as kp')
            ->join('kartu as k', 'kp.kartu_id', '=', 'k.id')
            ->select(DB::raw('k.name as namaKartu'), DB::raw('k.picture as gambar'))
            ->where('pemain_id', '=', $user->id)
            ->where('kartu_id', '!=', 25)
            ->get();

        $potongan = DB::table('kartu_pemain as kp')
            ->join('kartu as k', 'kp.kartu_id', '=', 'k.id')
            ->select(DB::raw('k.name as namaKartu'), DB::raw('k.picture as gambar'))
            ->where('pemain_id', '=', $user->id)
            ->where('kartu_id', '=', 25)
            ->get();

        return view('pemain.dashboardPemain', compact('user', 'kartu', 'selectKartu', 'utuh', 'potongan'));
    }

    function dashboard1()
    {
        $user = Auth::user()->pemain;
        // $kartu_pemain = DB::table('kartu_pemain as kp')
        //     ->join('kartu as k', 'kp.kartu_id', '=', 'k.id')
        //     ->join('pemain as p', 'kp.pemain_id', '=', 'p.id')
        //     ->select(DB::raw('p.name as namaPemain'), DB::raw('k.name as namaKartu'), 'k.is_full', DB::raw('k.picture as gambar'))
        //     ->where('p.id', '=', 1)
        //     ->get();

        $kartu = DB::table('kartu')
            ->select(DB::raw('name as namaKartu'))
            ->where('id', '<', 21)
            ->get();

        $selectKartu = DB::table('kartu_pemain as kp')
            ->join('kartu as k', 'kp.kartu_id', '=', 'k.id')
            ->join('pemain as p', 'kp.pemain_id', '=', 'p.id')
            ->select(DB::raw('p.name as namaPemain'), DB::raw('k.name as namaKartu'), 'k.is_full', DB::raw('k.picture as gambar'))
            ->where('k.is_full', '=', true)
            ->where('p.id', '=', $user->id)
            ->get();

        $utuh = DB::table('kartu_pemain as kp')
            ->join('kartu as k', 'kp.kartu_id', '=', 'k.id')
            ->select(DB::raw('k.name as namaKartu'), DB::raw('k.picture as gambar'))
            ->where('pemain_id', '=', $user->id)
            ->where('kartu_id', '!=', 25)
            ->get();

        $potongan = DB::table('kartu_pemain as kp')
            ->join('kartu as k', 'kp.kartu_id', '=', 'k.id')
            ->select(DB::raw('k.name as namaKartu'), DB::raw('k.picture as gambar'))
            ->where('pemain_id', '=', $user->id)
            ->where('kartu_id', '=', 25)
            ->get();

        return view('pemain.clipboardPemain', compact('user', 'kartu', 'selectKartu', 'utuh', 'potongan'));
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
