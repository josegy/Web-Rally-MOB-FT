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

        $jumlahPotongan = count($potongan);

        $kartu = DB::table('kartu_pemain as kp')
            ->where('kartu_id', '!=', 25)
            ->get();

        $jumlahKartu = count($kartu);

        return response()->json(array(
            'potongan' => $potongan,
            'jumlahPotongan' => $jumlahPotongan,
            'jumlahKartu' => $jumlahKartu
        ));
    }

    function tukar(Request $request)
    {
        $tipe = $request->get('tipe');

        // kalau pemain pilih 'random'
        if ($tipe == 'random') {
            // delete 3 potongan
            for ($i = 0; $i < 3; $i++) {
                $idDelete = DB::table('kartu_pemain')
                    ->select(DB::raw('min(id) as id'))
                    ->where('kartu_id', '=', 25)
                    ->where('pemain_id', '=', 1)
                    ->get();

                DB::table('kartu_pemain')->where('id', '=', $idDelete[0]->id)->delete();
            }

            $idCard = rand(1, 20);
            DB::table('kartu_pemain')->insert([
                'kartu_id' => $idCard,
                'pemain_id' => 1
            ]);

            $card = DB::table('kartu')
                ->select('name')
                ->where('id', '=', $idCard)
                ->get();
        }
        // kalau pemain pilih 'pilih'
        else if ($tipe == 'pilih') {
            // delete 5 potongan
            for ($i = 0; $i < 5; $i++) {
                $idDelete = DB::table('kartu_pemain')
                    ->select(DB::raw('min(id) as id'))
                    ->where('kartu_id', '=', 25)
                    ->where('pemain_id', '=', 1)
                    ->get();

                DB::table('kartu_pemain')->where('id', '=', $idDelete[0]->id)->delete();
            }

            $pilihan = $request->get('pilihan');

            $card = DB::table('kartu')
                ->where('name', 'like', '%' . $pilihan . '%')
                ->get();

            DB::table('kartu_pemain')->insert([
                'kartu_id' => $card[0]->id,
                'pemain_id' => 1
            ]);
        }
        // kalau pemain pilih 'spesial'
        else if ($tipe == 'spesial') {
            // $idDelete = DB::table('kartu_pemain')
            //     ->select(DB::raw('min(id) as id'))
            //     ->where('kartu_id', '=', 25)
            //     ->where('pemain_id', '=', 1)
            //     ->get();

            // DB::table('kartu_pemain')->where('id', '=', $idDelete[0]->id)->delete();

            $card = 'spesial';
        }

        return response()->json(array(
            'success' => true,
            'card' => $card
        ));
    }
}
