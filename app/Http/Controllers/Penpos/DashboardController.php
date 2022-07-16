<?php

namespace App\Http\Controllers\Penpos;

use App\Http\Controllers\Controller;
use App\Penpos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('penpos.dashboard.index');
    }

    public function changeStatus($penpos_id)
    {
        // Deklarasi Variable
        $msg = '';
        $status = '';
        // Ambil penpos yang minta ubah status
        $penpos = Penpos::find($penpos_id);

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
            
        } else if ($penpos->type == 'Single') {
            //Kalau status open ubah ke close
            if ($penpos->status == 'open') {
                $penpos->status = 'close';
                $msg = 'Status pos berhasil diubah menjadi close';
            }
            //Kalau status close ubah ke open
            else if ($penpos->status == 'close')
            {
                $penpos->status = 'open';
                $msg = 'Status pos berhasil diubah menjadi open';
            }
            $penpos->save();
        }
    }
}
