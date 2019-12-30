<?php

namespace App\Http\Controllers\Pasien;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Register;
use PDF;

class RegistrationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $datas = Register::with('polies')
                              ->where('user_id', $user->id)
                              ->orderBy('date_check','DESC')
                              ->get();
        $dataCounts = Register::with('polies')
                              ->where('user_id', $user->id)
                              ->count();
        return view('pasien.registration', compact('datas', 'dataCounts'));
    }

    public function exportAntrian(Request $request)
    {
        $poli       = \Crypt::decrypt($request->poli);
        $antrian    = \Crypt::decrypt($request->antrian);
        $hari       = \Crypt::decrypt($request->hari);
        $jamMulai   = \Crypt::decrypt($request->jamMulai);
        $jamSelesai = \Crypt::decrypt($request->jamSelesai);
        $pdf = PDF::loadView('pasien/export/kartuAntrian', compact('poli', 'antrian', 'hari', 'jamMulai', 'jamSelesai'));
        return $pdf->download('No Antrian'.date('Y-m-d_H-i-s').'.pdf');
    }
}
