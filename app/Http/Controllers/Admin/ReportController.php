<?php

namespace App\Http\Controllers\Admin;

use DB;
use PDF;
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
        session()->put('data', $isi);
        return view('admin.report.index', compact('datas', 'isi'));
    }

    public function search(Request $request)
    {
        // $date = '2019-12-15';
        $date = $request->date;
        $datas = Register::selectRaw('date_check, count(*) as jml')
                            ->whereDateCheck($date)
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
        if (count($datas) == 0) {
            $isi = 0;
        }
        session()->put('data', $isi);
        return view('admin.report.index', compact('datas', 'isi'));
    }

    public function export()
    {
        $isi = session()->get('data');
        $pdf = PDF::loadView('admin/export/report', compact('isi'));
        return $pdf->download('Report'.date('Y-m-d_H-i-s').'.pdf');
    }
}
