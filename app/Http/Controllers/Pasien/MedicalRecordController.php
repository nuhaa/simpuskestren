<?php

namespace App\Http\Controllers\Pasien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Register;
use App\Models\Schedule;
use App\Models\ListMedicine;
use App\Models\MedicalRecord;
use App\Models\MedicalRecordsListMedicine;
use App\Models\Medicine;

class MedicalRecordController extends Controller
{
    public function index()
    {
        /*prepare data*/
        $user = auth()->user()->id;
        $register = Register::with('polies','users','medicalRecords')
                                ->where('user_id', $user)
                                ->where('status_check', 'done')
                                // ->where('id', $id)
                                ->get()
                                ->toArray();
        // $user = $register->users->get();
        // $poly = $register->polies->first();
        // $medicalRecord = $register->medicalRecords->first();
        dd($register);
        foreach ($register as $key) {
            foreach($key['medical_records'] as $key2) {
              $isi = $key2['register_id'];
            }
        }
        // foreach ($register as $key) {
        //     foreach ($register['medicalRecords'] as $key) {
        //         $user = $key['id'];
        //     }
        // }
        $ids = $isi->MedicalRecordsListMedicines;
        // dd($ids);
        // $medicineName = array();
        $medicineName = [];
        foreach ($ids as $isi) {
           $medicine_id = $isi['medicine_id'];
           $listMedicineId = $isi->pivot['list_medicine_id'];
           $medicine = Medicine::where('id', $medicine_id)
                               ->first();
           $listMedicine = ListMedicine::where('id', q)
                               ->first();
           $medicineName[] = ['name' => $medicine->name." (".$medicine->aturan_pakai.")",
                              'price' => $listMedicine->price];
           // $medicineName['price'][] = ;
        }
        dd($medicineName);
        return view('pasien.medicalRecord');
    }
}
