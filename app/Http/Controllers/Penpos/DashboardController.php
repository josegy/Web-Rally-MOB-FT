<?php

namespace App\Http\Controllers\Penpos;

use App\Http\Controllers\Controller;
use App\Kartu;
use App\Pemain;
use App\Penpos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Events\penposStatus;
use Illuminate\Http\Response;

class DashboardController extends Controller
{
    public function index()
    {
        //Ambil penpos
        $penpos = Auth::user()->penpos;
        //Ambil semua pemain yang ada
        $all_pemain = $this->getAllPemain();
        $all_pemain_playing = $this->getAllPemainPlaying();

        // dd(count($all_pemain_playing));
        // dd($all_pemain);

        // $penpos->status = "KOSONG";
        // $penpos->save();

        if ($penpos->type == "Single") {
            return view('penpos.single', compact('all_pemain', 'penpos','all_pemain_playing'));
        } else if ($penpos->type == "Battle") {
            return view('penpos.battle', compact('all_pemain', 'penpos','all_pemain_playing'));
        }
    }

    // Buat dapatin semua pemain yang belum pernah bermain di pos
    public function getAllPemain()
    {
        // Ambil penpos yang sedang login
        $penpos = Auth::user()->penpos;
        $all_pemain = $penpos->pemains()->where('is_done', 0)->get();
        return $all_pemain;
    }

    // Buat dapatin semua pemain yang belum pernah bermain di pos dan sedang berada di posisi bermain
    public function getAllPemainPlaying()
    {
        // Ambil penpos yang sedang login
        $penpos = Auth::user()->penpos;
        $all_pemain_playing = $penpos->pemains()->where('is_done', 0)->where('playing',1)->get();
        return $all_pemain_playing;
    }

    //FUCNTION UNTUK CEK APAKAH PEMAIN PERNAH BERMAIN DI PENPOS SINGLE?
    public function cekPosSingle(Request $request)
    {
        // Deklarasi Variable
        $msg = '';
        $status = '';
        // Ambil penpos yang 
        $penpos = Auth::user()->penpos;
        $pemain = Pemain::find($request['pemain1_id']);

        //Cek apakah penposnya ada atau tidak
        if ($penpos == null) {
            $status = 'error';
            $msg = 'Penpos yang dimasukan tidak valid';

            return response()->json(array(
                'status' => $status,
                'msg' => $msg,
            ), 200);
        }

        //Cek apakah pemainnya ada atau tidak
        if ($pemain == null) {
            $status = 'error';
            $msg = 'Pemain yang dimasukan tidak valid';

            return response()->json(array(
                'status' => $status,
                'msg' => $msg,
            ), 200);
        }

        //get penpos_pemain
        $bermain = $penpos->pemains->where('id', $pemain->id)->first();

        if ($bermain->pivot->is_done) {
            $status = 'error';
            $msg = 'Tim pemain ini sudah bermain di pos ' . $penpos->name;

            return response()->json(array(
                'status' => $status,
                'msg' => $msg,
            ), 200);
        }

        // UBAH STATUS
        $penpos->status = 'PENUH';
        $penpos->save();

        // UBAH status playing jadi 1 karena hendak bermain
        $penpos->pemains()->sync([$pemain->id => ['playing' => 1]], false);

        $status = 'success';
        $msg = 'Status pos berhasil diubah menjadi penuh. Permainan siap dimulai!';

        //pusher
        $penposStatus = ['penpos' => $penpos, 'status' => 'PENUH'];
        event(new penposStatus($penposStatus));

        return response()->json(array(
            "success" => true,
            'penpos' => $penpos,
            'status' => $status,
            'msg' => $msg,
        ), 200);
    }

    public function ubahStatusPosBattle(Request $request)
    {
        // Deklarasi Variable
        $msg = '';
        $status = '';
        // Ambil penpos yang 
        $penpos = Auth::user()->penpos;
        $totalValidasi = $request['totalValidasi'];
        $id_pemain1 = $request['pemain1_id'];
        $id_pemain2 = $request['pemain2_id'];

        //Cek apakah penposnya ada atau tidak
        if ($penpos == null) {
            $status = 'error';
            $msg = 'Penpos yang dimasukan tidak valid!';

            return response()->json(array(
                'status' => $status,
                'msg' => $msg,
            ), 200);
        }

        // Cek apakah pemain yang diinput itu sama atau tidak?
        if ($id_pemain1 == $id_pemain2) {
            $status = 'error';
            $msg = 'Pemain yang dimasukan tidak boleh sama!';

            return response()->json(array(
                'status' => $status,
                'msg' => $msg,
            ), 200);
        }

        // UBAH STATUS PENPOS
        if ($totalValidasi == "11") {
            $penpos->status = 'PENUH';
            $penpos->save();

            $status = 'success';
            $msg = 'Status pos berhasil diubah menjadi penuh. Permainan siap dimulai!';

            //pusher
            $penposStatus = ['penpos' => $penpos, 'status' => 'PENUH'];
            event(new penposStatus($penposStatus));
        } else {
            $status = 'error';
            $msg = 'Terdapat pemain yang masih belum di validasi';
        }

        return response()->json(array(
            "success" => true,
            'penpos' => $penpos,
            'status' => $status,
            'msg' => $msg,
        ), 200);
    }

    public function cekPemainBattle(Request $request)
    {
        // Deklarasi Variable
        $msg = '';
        $status = '';
        // Ambil penpos yang 
        $penpos = Auth::user()->penpos;
        $pemain = Pemain::find($request['pemain_id']);

        //Cek apakah penposnya ada atau tidak
        if ($penpos == null) {
            $status = 'error';
            $msg = 'Penpos yang dimasukan tidak valid';

            return response()->json(array(
                'status' => $status,
                'msg' => $msg,
            ), 200);
        }

        //Cek apakah pemainnya ada atau tidak
        if ($pemain == null) {
            $status = 'error';
            $msg = 'Pemain yang dimasukan tidak valid';

            return response()->json(array(
                'status' => $status,
                'msg' => $msg,
            ), 200);
        }

        //get penpos_pemain
        $bermain = $penpos->pemains->where('id', $pemain->id)->first();
        if ($bermain->pivot->is_done) {
            $status = 'error';
            $msg = 'Tim pemain ini sudah bermain di pos ' . $penpos->name;

            return response()->json(array(
                'status' => $status,
                'msg' => $msg,
            ), 200);
        }

        // UBAH Status penpos
        $penpos->status = 'MENUNGGU LAWAN';
        $penpos->save();

        // UBAH status playing jadi 1 karena hendak bermain
        $penpos->pemains()->sync([$pemain->id => ['playing' => 1]], false);

        
        $status = 'success';
        $msg = 'Status pos berhasil diubah menjadi menunggu lawan!';
        //pusher
        $penposStatus = ['penpos' => $penpos, 'status' => 'MENUNGGU LAWAN'];
        event(new penposStatus($penposStatus));
        
        return response()->json(array(
            "success" => true,
            'penpos' => $penpos,
            'status' => $status,
            'msg' => $msg,
        ), 200);
    }

    //FUNCTION UNTUK HASIL PERMAINAN PENPOS
    public function resultGame(Request $request)
    {
        $msg = '';
        $status = '';
        // Ambil penpos yang login
        $penpos = Auth::user()->penpos;

        // Ambil data dari AJAX
        $status_game = $request['status_game'];
        $pemain1 = Pemain::find($request['pemain1_id']);

        //Cek apakah penposnya ada atau tidak
        if ($penpos == null) {
            $status = 'error';
            $msg = 'Penpos yang dimasukan tidak valid';

            return response()->json(array(
                'status' => $status,
                'msg' => $msg,
            ), 200);
        }

        //Cek apakah pemainnya ada atau tidak
        if ($pemain1 == null) {
            $status = 'error';
            $msg = 'Pemain yang dimasukan tidak valid';

            return response()->json(array(
                'status' => $status,
                'msg' => $msg,
            ), 200);
        }

        // Ambil kartu penpos
        // Pos dg id 1 bakal dapet 6 wajik, id 6 bakal dpt 6 keriting, id 11 bakal dpt 6 love, id 16 bakal dpt 6 waru
        // Pos id = Kartu Id
        // Ambil kartu utuh buat pemenang
        $kartuMenang = Kartu::find($penpos->id);

        // Ambil kartu potongan buat kalah/draw
        $kartuKalah = Kartu::find(25);

        //Cek Type Penpos
        if ($penpos->type == "Single") {
            //Kalau Single Menang dpt 1 utuh
            if ($status_game == "Menang") {
                $pemain1->kartus()->attach($kartuMenang->id);
                $msg = 'Pemain ' . $pemain1->name . ' memenangkan pos ' . $penpos->name;
            }
            //Kalau Single Kalah dpt 1 potongan
            else if ($status_game == "Kalah") {
                $pemain1->kartus()->attach($kartuKalah->id);
                $msg = 'Pemain ' . $pemain1->name . ' gagal memenangkan pos ' . $penpos->name;
            }
            // UBAH status playing jadi 0 karena sudah selesai bermain
            $penpos->pemains()->sync([$pemain1->id => ['playing' => 0]], false);

            // UBAH Status pemain_penpos menjadi done (1)
            $penpos->pemains()->sync([$pemain1->id => ['is_done' => 1]], false);
        } else if ($penpos->type == "Battle") {
            //Ambil pemain2
            $pemain2 = Pemain::find($request['pemain2_id']);
            //Kalau Battle Menang, yang menang dpt 1 utuh, yang kalah 1 potongan
            if ($status_game == "Menang") {
                $pemain1->kartus()->attach($kartuMenang->id);
                $pemain2->kartus()->attach($kartuKalah->id);

                $msg = 'Pemain ' . $pemain1->name . ' memenangkan pos ' . $penpos->name . '\n';
                $msg += 'Pemain ' . $pemain2->name . ' gagal memenangkan pos ' . $penpos->name;
            }
            //Kalau Battle Seri keduanya dpt 1 potongan
            else if ($status_game == "Seri") {
                $pemain1->kartus()->attach($kartuKalah->id);
                $pemain2->kartus()->attach($kartuKalah->id);

                $msg = 'Pemain ' . $pemain1->name . ' dan ' . $pemain2->name . ' mendapatkan hasil seri pada pos ' . $penpos->name;
            }
            //Kalau Battle Kalah, yang menang dpt 1 utuh, yang kalah 1 potongan
            else if ($status_game == "Kalah") {
                $pemain1->kartus()->attach($kartuKalah->id);
                $pemain2->kartus()->attach($kartuMenang->id);

                $msg = 'Pemain ' . $pemain2->name . ' memenangkan pos ' . $penpos->name . '\n';
                $msg += 'Pemain ' . $pemain1->name . ' gagal memenangkan pos ' . $penpos->name;
            }
            $pemain2->save();
            // UBAH status playing jadi 0 karena sudah selesai bermain
            $penpos->pemains()->sync([$pemain1->id => ['playing' => 0]], false);
            $penpos->pemains()->sync([$pemain2->id => ['playing' => 0]], false);

            // UBAH Status pemain_penpos menjadi done (1)
            $penpos->pemains()->sync([$pemain1->id => ['is_done' => 1]], false);
            $penpos->pemains()->sync([$pemain2->id => ['is_done' => 1]], false);
        }

        $pemain1->save();

        // UBAH Status setelah memberikan hadiah
        $penpos->status = 'KOSONG';
        $penpos->save();

        
        $status = 'success';
        
        $all_pemain = $this->getAllPemain();
        //pusher
        $penposStatus = ['penpos' => $penpos, 'status' => 'KOSONG'];
        event(new penposStatus($penposStatus));
        
        return response()->json(array(
            "success" => true,
            'penpos' => $penpos,
            'all_pemain' => $all_pemain,
            'status' => $status,
            'msg' => $msg,
        ), 200);
    }

    public function resetPlaying(Request $request)
    {
        $msg = '';
        $status = '';
        // Ambil penpos yang login
        $penpos = Auth::user()->penpos;
        // Ambil penpos yang mau reset
        $pemain = Pemain::find($request['pemain_id']);
        $totalValidasi = '';

        //Cek apakah pemainnya ada atau tidak
        if ($pemain == null) {
            $status = 'error';
            $msg = 'Pemain yang dimasukan tidak valid';

            return response()->json(array(
                'status' => $status,
                'msg' => $msg,
            ), 200);
        }

        if ($penpos->type == "Single") {
            // Langsung ubah status penpos jadi KOSONG
            $penpos->status = 'KOSONG';
        } else if ($penpos->type == "Battle") {
            $totalValidasi = $request['totalValidasi'];
            // CEK totalValidasi 
            // kalau 0 dan 0 berarti dua-duanya reset
            if($totalValidasi == "11"){
                $penpos->status = 'MENUNGGU LAWAN';
            }
            // Kasus kalau salah satu minta reset tapi yang satunya tetap
            else if ($totalValidasi == "01" || $totalValidasi == "10"){
                $penpos->status = 'KOSONG';
            }
        }

        // Simpan ke db statusnya
        $penpos->save();

        // UBAH data pemain_penpos di bagian playing jadi 0
        $penpos->pemains()->sync([$pemain->id => ['playing' => 0]], false);

        // Ambil data all_pemain dan all_pemain_playing
        $all_pemain = $this->getAllPemain();
        $all_pemain_playing = $this->getAllPemainPlaying();
        $total = count($all_pemain_playing);
        // Perbaruhi penposnya
        $penpos = Auth::user()->penpos;

        $status = 'success';
        $msg = 'Berhasil melakukan reset playing';

        return response()->json(array(
            'penpos' => $penpos,
            'all_pemain' => $all_pemain,
            'all_pemain_playing' => $all_pemain_playing,
            'total' => $total,
            'status' => $status,
            'msg' => $msg,
        ), 200);
    }
}
