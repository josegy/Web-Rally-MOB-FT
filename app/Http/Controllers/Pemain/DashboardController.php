<?php

namespace App\Http\Controllers\Penpos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pemain.pemain');
    }
}
