<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class KartuController extends Controller
{
    function checkPotongan()
    {
        $user = Auth::user()->pemain;

        $potongan = DB::table('kartu_pemain as kp')
            ->join('kartu as k', 'kp.kartu_id', '=', 'k.id')
            ->join('pemain as p', 'kp.pemain_id', '=', 'p.id')
            ->select(DB::raw('p.name as namaPemain'), DB::raw('k.name as namaKartu'), 'k.is_full', DB::raw('k.picture as gambar'))
            ->where('p.id', '=', 1)
            ->where('k.name', 'like', '%potongan%')
            ->where('k.is_full', '=', false)
            ->get();

        $jumlahPotongan = count($potongan);

        $kartu = DB::table('kartu_pemain')
            ->where('kartu_id', '!=', 25)
            ->where('pemain_id', '=', $user->id)
            ->get();

        $jumlahKartu = count($kartu);

        $selectKartu = DB::table('kartu_pemain as kp')
            ->join('kartu as k', 'kp.kartu_id', '=', 'k.id')
            ->join('pemain as p', 'kp.pemain_id', '=', 'p.id')
            ->select(DB::raw('p.name as namaPemain'), DB::raw('k.name as namaKartu'), 'k.is_full', DB::raw('k.picture as gambar'))
            ->where('k.is_full', '=', true)
            ->where('p.id', '=', $user->id)
            ->get();

        $html = '';
        foreach ($selectKartu as $sk) {
            $html .= '<option value="' . $sk->namaKartu . '">' . str_replace('_', ' ', $sk->namaKartu) . '</option>';
        }

        return response()->json(array(
            'potongan' => $potongan,
            'jumlahPotongan' => $jumlahPotongan,
            'jumlahKartu' => $jumlahKartu,
            'selectKartu' => $html
        ));
    }

    function tukar(Request $request)
    {
        $user = Auth::user()->pemain;

        $tipe = $request->get('tipe');

        // kalau pemain pilih 'random'
        if ($tipe == 'random') {
            // delete 3 potongan
            for ($i = 0; $i < 3; $i++) {
                $idDelete = DB::table('kartu_pemain')
                    ->select(DB::raw('min(id) as id'))
                    ->where('kartu_id', '=', 25)
                    ->where('pemain_id', '=', $user->id)
                    ->get();

                DB::table('kartu_pemain')->where('id', '=', $idDelete[0]->id)->delete();
            }

            $idCard = rand(1, 20);
            DB::table('kartu_pemain')->insert([
                'kartu_id' => $idCard,
                'pemain_id' => $user->id
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
                    ->where('pemain_id', '=', $user->id)
                    ->get();

                DB::table('kartu_pemain')->where('id', '=', $idDelete[0]->id)->delete();
            }

            $pilihan = $request->get('pilihan');

            $card = DB::table('kartu')
                ->where('name', 'like', '%' . $pilihan . '%')
                ->get();

            DB::table('kartu_pemain')->insert([
                'kartu_id' => $card[0]->id,
                'pemain_id' => $user->id
            ]);
        }
        // kalau pemain pilih 'spesial'
        else if ($tipe == 'spesial') {
            // delete 1 potongan
            $idPotongan = DB::table('kartu_pemain')
                ->select(DB::raw('min(id) as id'))
                ->where('kartu_id', '=', 25)
                ->where('pemain_id', '=', $user->id)
                ->get();

            DB::table('kartu_pemain')->where('id', '=', $idPotongan[0]->id)->delete();

            // delete 1 kartu
            $namaKartu = $request->get('kartu');
            $idKartu = DB::table('kartu_pemain as kp')
                ->join('kartu as k', 'k.id', '=', 'kp.kartu_id')
                ->where('k.name', 'like', '%' . $namaKartu . '%')
                ->where('kp.pemain_id', '=', $user->id)
                ->get();

            DB::table('kartu_pemain')->where('kartu_id', '=', $idKartu[0]->kartu_id)->delete();

            $specialCard = $request->get('specialCard');

            $kartu = DB::table('kartu')
                ->where('name', 'like', '%' . $specialCard . '%')
                ->get();

            $count = count($kartu) - 1;
            $key = rand(0, $count);
            $card = $kartu[$key];

            DB::table('kartu_pemain')->insert([
                'kartu_id' => $card->id,
                'pemain_id' => $user->id
            ]);
        }

        $utuh = DB::table('kartu_pemain as kp')
            ->join('kartu as k', 'kp.kartu_id', '=', 'k.id')
            ->select(DB::raw('k.name as namaKartu'), DB::raw('k.picture as gambar'))
            ->where('pemain_id', '=', $user->id)
            ->where('kartu_id', '!=', 25)
            ->orderBy("kp.id", "desc")
            ->first();

        return response()->json(array(
            'success' => true,
            'card' => $card,
            'utuh' => $utuh
        ));
    }
}
