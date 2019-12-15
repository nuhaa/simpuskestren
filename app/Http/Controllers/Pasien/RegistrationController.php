<?php

namespace App\Http\Controllers\Pasien;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Register;

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
}
