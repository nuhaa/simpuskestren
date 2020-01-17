<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Register;

class ReportController extends Controller
{
    public function index()
    {
        $datas = Register::selectRaw('date_check, count(*) as jml')
                            ->groupBy('date_check')
                            ->get();
        foreach ($datas as $data) {
            $isi[$data['date_check']]['umum'] = DB::connection('mysql')->select(DB::raw("SELECT COUNT(*) as jml
                                                  FROM registers a
                                                  JOIN polies b
                                                  on a.poly_id = b.id
                                                  WHERE a.date_check = '$data[date_check]' and a.poly_id='1'"));
            $isi[$data['date_check']]['gigi'] = DB::connection('mysql')->select(DB::raw("SELECT COUNT(*) as jml
                                                  FROM registers a
                                                  JOIN polies b
                                                  on a.poly_id = b.id
                                                  WHERE a.date_check = '$data[date_check]' and a.poly_id='2'"));
            $isi[$data['date_check']]['kia'] = DB::connection('mysql')->select(DB::raw("SELECT COUNT(*) as jml
                                                  FROM registers a
                                                  JOIN polies b
                                                  on a.poly_id = b.id
                                                  WHERE a.date_check = '$data[date_check]' and a.poly_id='3'"));
            $isi[$data['date_check']]['jml'] = $data['jml'];
            $isi[$data['date_check']]['tgl'] = $data['date_check'];
        }
        // dd($isi);
        return view('admin.report.index', compact('datas', 'isi'));
    }
}
