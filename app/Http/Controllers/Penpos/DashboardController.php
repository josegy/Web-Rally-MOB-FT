<?php

namespace App\Http\Controllers\Penpos;

use App\Http\Controllers\Controller;
use App\Kartu;
use App\Pemain;
use App\Penpos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('penpos.dashboard.index');
    }

    //FUCNTION UNTUK UBAH STATUS PENPOS
    public function changeStatus($penpos_id)
    {
        // Deklarasi Variable
        $msg = '';
        $status = '';
        // Ambil penpos yang minta ubah status
        $penpos = Penpos::find($penpos_id);//Ini bisa diambil pakai Auth

        //Cek apakah penposnya ada atau tidak
        if ($penpos == null) {
            $status = 'error';
            $msg = 'Tidak ada penpos yang memiliki id ' . $penpos_id;

            return response()->json(array(
                'status' => $status,
                'msg' => $msg,
            ), 200);
        }

        //MASIH DI HOLD KARENA BELUM TAHU FRONT ENDNYA (Masih Asumsi 1 Button)
        //Cek tipe penposnya
        if ($penpos->type == 'Battle') {
            //Belum tahu ini
        } else if ($penpos->type == 'Single') {
            //Kalau status open ubah ke close
            if ($penpos->status == 'open') {
                $penpos->status = 'close';
                $msg = 'Status pos berhasil diubah menjadi close';
            }
            //Kalau status close ubah ke open
            else if ($penpos->status == 'close') {
                $penpos->status = 'open';
                $msg = 'Status pos berhasil diubah menjadi open';
            }
            $penpos->save();
        }

        //Return
        return response()->json(array(
            'status' => $status,
            'msg' => $msg,
        ), 200);
    }

    //FUCNTION UNTUK CEK APAKAH PEMAIN PERNAH BERMAIN DI PENPOS?
    public function cekPos(Request $request)
    {
        // Deklarasi Variable
        $msg = '';
        $status = '';
        // Ambil penpos yang 
        $penpos = Penpos::find($request['penpos_id']);//Ini bisa diambil dri Auth
        $pemain = Pemain::find($request['pemain_id']);

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
        $bermain = $penpos->pemains->where('id',$pemain->id)->first();
        if($bermain->pivot->is_done){
            $status = 'error';
            $msg = 'Tim pemain ini sudah bermain di pos '.$penpos->name;

        }else{
            $status = 'success';
            $msg = 'Tim pemain ini dapat bermain di pos '.$penpos->name;
        }

        return response()->json(array(
            'status' => $status,
            'msg' => $msg,
        ), 200);
    }

    //FUNCTION UNTUK HASIL PERMAINAN PENPOS
    public function resultGame(Request $request){
        $msg = '';
        $status = '';
        // Ambil penpos yang login
        $penpos = Penpos::find($request['penpos_id']);//Ini bisa diambil dri Auth
        // Ambil dari AJAX pemain yang kalah
        $pemainLose = Pemain::find($request['pemain_id_kalah']);
        // Ambil dari AJAX pemain yang menang
        $pemainWin = Pemain::find($request['pemain_id_menang']);

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
        if ($pemainLose == null) {
            $status = 'error';
            $msg = 'Tidak ada pemain yang memiliki id ' . $pemainLose->id;

            return response()->json(array(
                'status' => $status,
                'msg' => $msg,
            ), 200);
        }

        // Cek apakah pemainnya ada atau tidak
        if ($pemainWin == null) {
            $status = 'error';
            $msg = 'Tidak ada pemain yang memiliki id ' . $pemainWin->id;

            return response()->json(array(
                'status' => $status,
                'msg' => $msg,
            ), 200);
        }

        // Ambil kartu penpos
        // Pos dg id 1 bakal dapet 6 wajik, id 6 bakal dpt 6 keriting, id 11 bakal dpt 6 love, id 16 bakal dpt 6 waru
        // Pos id = Kartu Id
        $kartuPenpos = Kartu::find($penpos->id);

        // Cek tipe penpos
        if ($penpos->type == 'Battle') {
            
        } else if ($penpos->type == 'Single') {
            
        }

    }
}
