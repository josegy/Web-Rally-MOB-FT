<?php

namespace App\Http\Controllers\Penpos;

use App\Http\Controllers\Controller;
use App\Kartu;
use App\Pemain;
use App\Penpos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        //Ambil penpos
        $penpos = Auth::user()->penpos;
        //Ambil semua pemain yang ada
        $all_pemain = $this->getAllPemain();

        if ($penpos->type == "Single") {
            return view('admin.dashboard', compact('all_pemain', 'penpos'));
        } else if ($penpos->type == "Battle") {
            return view('admin.dashboard2', compact('all_pemain', 'penpos'));
        }
    }

    public function getAllPemain()
    {
        $penpos = Auth::user()->penpos;
        $all_pemain = $penpos->pemains()->where('is_done', 0)->get();
        return $all_pemain;
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
            $msg = 'Tidak ada penpos yang memiliki id ' . $penpos->id;

            return response()->json(array(
                'status' => $status,
                'msg' => $msg,
            ), 200);
        }

        //Cek apakah pemainnya ada atau tidak
        if ($pemain == null) {
            $status = 'error';
            $msg = 'Tidak ada pemain yang memiliki id ' . $pemain->id;

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

        $status = 'success';
        $msg = 'Status pos berhasil diubah menjadi penuh. Permainan siap dimulai!';

        return response()->json(array(
            'penpos' => $penpos,
            'status' => $status,
            'msg' => $msg,
        ), 200);
    }

    //FUCNTION UNTUK CEK APAKAH PEMAIN 1 PERNAH BERMAIN DI PENPOS BATTLE?
    public function cekPosBattle1(Request $request)
    {
        // Deklarasi Variable
        $msg = '';
        $status = '';
        // Ambil penpos yang 
        $penpos = Auth::user()->penpos;
        $pemain1 = Pemain::find($request['pemain1_id']);

        //Cek apakah penposnya ada atau tidak
        if ($penpos == null) {
            $status = 'error';
            $msg = 'Tidak ada penpos yang memiliki id ' . $penpos->id;

            return response()->json(array(
                'status' => $status,
                'msg' => $msg,
            ), 200);
        }

        //Cek apakah pemainnya ada atau tidak
        if ($pemain1 == null) {
            $status = 'error';
            $msg = 'Tidak ada pemain yang memiliki id ' . $pemain1->id;

            return response()->json(array(
                'status' => $status,
                'msg' => $msg,
            ), 200);
        }

        //get penpos_pemain
        $bermain = $penpos->pemains->where('id', $pemain1->id)->first();
        if ($bermain->pivot->is_done) {
            $status = 'error';
            $msg = 'Tim pemain ini sudah bermain di pos ' . $penpos->name;

            return response()->json(array(
                'status' => $status,
                'msg' => $msg,
            ), 200);
        }

        // UBAH STATUS
        $penpos->status = 'MENUNGGU LAWAN';
        $penpos->save();

        $status = 'success';
        $msg = 'Status pos berhasil diubah menjadi menunggu lawan!';

        return response()->json(array(
            'status' => $status,
            'msg' => $msg,
        ), 200);
    }

    //FUCNTION UNTUK CEK APAKAH PEMAIN 2 PERNAH BERMAIN DI PENPOS BATTLE?
    public function cekPosBattle2(Request $request)
    {
        // Deklarasi Variable
        $msg = '';
        $status = '';
        // Ambil penpos yang 
        $penpos = Auth::user()->penpos;
        $pemain2 = Pemain::find($request['pemain1_id']);

        //Cek apakah penposnya ada atau tidak
        if ($penpos == null) {
            $status = 'error';
            $msg = 'Tidak ada penpos yang memiliki id ' . $penpos->id;

            return response()->json(array(
                'status' => $status,
                'msg' => $msg,
            ), 200);
        }

        //Cek apakah pemainnya ada atau tidak
        if ($pemain2 == null) {
            $status = 'error';
            $msg = 'Tidak ada pemain yang memiliki id ' . $pemain2->id;

            return response()->json(array(
                'status' => $status,
                'msg' => $msg,
            ), 200);
        }

        //get penpos_pemain
        $bermain = $penpos->pemains->where('id', $pemain2->id)->first();
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

        $status = 'success';
        $msg = 'Status pos berhasil diubah menjadi penuh. Permainan siap dimulai!';

        return response()->json(array(
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
            $msg = 'Tidak ada penpos yang memiliki id ' . $penpos->id;

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
        if($penpos->type == "Single"){
            //Kalau Single Menang dpt 1 utuh
            if($status_game == "Menang"){
                $pemain1->kartus()->attach($kartuMenang->id);
                $msg = 'Pemain '.$pemain1->name.' memenangkan pos '.$penpos->name;
            }
            //Kalau Single Kalah dpt 1 potongan
            else if($status_game == "Kalah"){
                $pemain1->kartus()->attach($kartuKalah->id);
                $msg = 'Pemain '.$pemain1->name.' gagal memenangkan pos '.$penpos->name;
            }
        }
        else if ($penpos->type =="Battle"){
            //Ambil pemain2
            $pemain2 = Pemain::find($request['pemain2_id']);
            //Kalau Battle Menang, yang menang dpt 1 utuh, yang kalah 1 potongan
            if($status_game == "Menang"){
                $pemain1->kartus()->attach($kartuMenang->id);
                $pemain2->kartus()->attach($kartuKalah->id);

                $msg = 'Pemain '.$pemain1->name.' memenangkan pos '.$penpos->name.'\n';
                $msg += 'Pemain '.$pemain2->name.' gagal memenangkan pos '.$penpos->name;
            }
            //Kalau Battle Seri keduanya dpt 1 potongan
            else if ($status_game == "Seri"){
                $pemain1->kartus()->attach($kartuKalah->id);
                $pemain2->kartus()->attach($kartuKalah->id);

                $msg = 'Pemain '.$pemain1->name.' dan '. $pemain2->name .' mendapatkan hasil seri pada pos '.$penpos->name;
            }
            //Kalau Battle Kalah, yang menang dpt 1 utuh, yang kalah 1 potongan
            else if($status_game == "Kalah"){
                $pemain1->kartus()->attach($kartuKalah->id);
                $pemain2->kartus()->attach($kartuMenang->id);

                $msg = 'Pemain '.$pemain2->name.' memenangkan pos '.$penpos->name.'\n';
                $msg += 'Pemain '.$pemain1->name.' gagal memenangkan pos '.$penpos->name;
            }
            $pemain2->save();
        }

        $pemain1->save();
        $penpos->status = 'KOSONG';
        $penpos->save();

        $status = 'success';

        return response()->json(array(
            'status' => $status,
            'msg' => $msg,
        ), 200);
    }
}
