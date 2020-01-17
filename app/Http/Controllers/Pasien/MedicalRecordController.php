<?php

namespace App\Http\Controllers\Pasien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Register;
use App\Models\Medicine;
use App\Models\MedicalRecordsListMedicine;

class MedicalRecordController extends Controller
{
    public function index()
    {
        /*prepare data*/
        $user = auth()->user()->id;
        $register = Register::with('polies','users','medicalRecords')
                                ->where('user_id', $user)
                                ->where('status_check', 'done')
                                ->get();
        $id = $register[0]->medicalRecords[0]->id;
        $medicineList = MedicalRecordsListMedicine::with('listMedicine')
                                ->where('medical_record_id', $id)->get();
        // $data = [];
        foreach ($medicineList as $key) {
            // $data[] = $key['listMedicine'];
            foreach ($key['listMedicine'] as $value) {
                $id = $value['medicine_id'];
                $cekNama = Medicine::where('id', $id)->first();
                $data['nama'][] = $cekNama;
                $data['expired'][] = $value['date_expired'];
            }
        }

        $dataCounts = Register::where('status_check', 'done')
                              ->where('user_id', $user)
                              ->count();
        return view('pasien.medicalRecord', compact('register', 'data', 'dataCounts'));
    }
}
