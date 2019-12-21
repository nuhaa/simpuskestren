<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Register;

class HomeController extends Controller
{
    public function index()
    {
        $dateNow = date('Y-m-d');
        $umum = Register::where('date_check', $dateNow)
                          ->where('poly_id', 1)
                          ->where('status_check', 'register')
                          ->orderBy('no_antrian', 'ASC')
                          ->count();
        $gigi = Register::where('date_check', $dateNow)
                          ->where('poly_id', 2)
                          ->where('status_check', 'register')
                          ->orderBy('no_antrian', 'ASC')
                          ->count();
        $kia = Register::where('date_check', $dateNow)
                          ->where('poly_id', 3)
                          ->where('status_check', 'register')
                          ->orderBy('no_antrian', 'ASC')
                          ->count();
        return view('homepage', compact('umum', 'gigi', 'kia'));
    }
}
