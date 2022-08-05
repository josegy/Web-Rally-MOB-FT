<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EdController extends Controller
{
    function index(){
        $data = DB::table('ed')->get();
        return view('dealer.ed', compact('data'));
    }

    function edit(Request $request){
        $start = $request->get('start');
        $end = $request->get('end');
        DB::table('ed')->update(['start'=>$start, 'end'=>$end]);
        return redirect()->route('ed')
        ->with('status','Data berhasil diperbarui!');
    }
}
