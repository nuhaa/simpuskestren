<?php

namespace App\Http\Controllers\Pasien;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Register;
// use Alert;

class DashboardController extends Controller
{
    public function index()
    {
        // Alert::success('pesan yang ingin disampaikan', 'Judul Pesan')->persistent("Close");
        return view('pasien.index');
    }

    public function formTanggal(Request $request)
    {
        $poli = $request->poli;
        $name = $request->name;
        $dateNow = date('Y-m-d');
        $date2 = [];
        for ($i=0; $i < 30; $i++) {
            $tanggal = date('Y-m-d', strtotime($dateNow. ' + '.$i.' days'));
            $cekCount = Register::where('date_check', $tanggal)
                                        ->where('poly_id', $poli)
                                        ->count();
            if ($cekCount > 0){
                $jamAkhir = Register::where('date_check', $tanggal)
                                          ->where('poly_id', $poli)
                                          ->latest('no_antrian')
                                          ->first();
                /* cek saat jam akhir dengan jam sekarang */
                $cekJamSekarang   = str_replace(":","",date("h:i:s"));
                $cekJamAkhirStart = str_replace(":","", $jamAkhir['time_check_end']);
                if ($cekJamAkhirStart > $cekJamSekarang) {
                  $jamAkhirStar = $jamAkhir['time_check_end'];
                } else {
                  $jamAkhirStar = date("h:i:s");
                }
                $jamAkhirEnd = date('h:i:s',strtotime('+10 minutes',strtotime($jamAkhirStar)));
                $noAntrian = $jamAkhir['no_antrian'];
            } else {
                /* cek saat jam akhir dengan jam sekarang */
                $dayNow = date('d');
                $dayChoice = date('d', strtotime($tanggal));
                if ($dayNow == $dayChoice) {
                    $jamNow = str_replace(":","",date("h:i:s"));
                    $jamAwal = str_replace(":","", "07:00:00");
                    if ($jamNow > $jamAwal) {
                      $jamAkhirStar = date("h:i:s");
                      $jamAkhirEnd = date('h:i:s',strtotime('+10 minutes',strtotime($jamAkhirStar)));
                    }else{
                      $jamAkhirStar = "07:00:00";
                      $jamAkhirEnd = "07:10:00";
                    }
                }else{
                    $jamAkhirStar = "07:00:00";
                    $jamAkhirEnd = "07:10:00";
                }
                $noAntrian = 0;
            }
            $date2[] = [
              'tanggal' => $tanggal,
              'jumlah' => $cekCount,
              'jamAkhirStar' => $jamAkhirStar,
              'jamAkhirEnd' => $jamAkhirEnd,
              'noAntrian' => $noAntrian+1,
            ];
        }
        return view('pasien.formTanggal', compact('data', 'date2', 'poli', 'name'));
    }

    public function storeAntrian(Request $request)
    {
      $userId         = $request->userId;
      $poliId         = $request->poliId;
      $noAntrian      = $request->noAntrian+1;
      $tanggalPeriksa = $request->tanggalPeriksa;
      $jamAkhirStart  = $request->jamAkhirStart;
      $jamAkhirEnd    = $request->jamAkhirEnd;

      $cekNoAntrian = Register::where('user_id', $userId)
                                  ->where('poly_id', $poliId)
                                  ->where('date_check', $tanggalPeriksa)
                                  ->count();
      if ($cekNoAntrian > 0) {
        echo "exist";
      } else {
        Register::create([
          'user_id' => $userId,
          'poly_id' => $poliId,
          'no_antrian' => $noAntrian,
          'date_check' => $tanggalPeriksa,
          'time_check_start' => $jamAkhirStart,
          'time_check_end' => $jamAkhirEnd,
          'status_check' => 'register',
          'created_at' => Carbon::now(),
        ]);
        echo "berhasil";
      }

    }
}
