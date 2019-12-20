<?php

namespace App\Http\Controllers\Admin;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Register;
use App\Models\Schedule;
use App\Models\ListMedicine;
use App\Models\MedicalRecord;
use App\Models\MedicalRecordsListMedicine;
use App\Models\Medicine;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        foreach ($user->roles as $isi) {
            $roles = $isi['name'];
        }
        $datas = Register::with('polies','users');
        if ($roles == 'dokter') {
            $dayNow = format_hari(Carbon::now()->format('l'));
            $cekPoli = Schedule::where('day',$dayNow)
                                  ->where('user_id', $user->id)
                                  ->first();
            $polyId = $cekPoli->poly_id;
            $datas = $datas ->where('poly_id',$polyId)
                            ->where('status_check','check_doctor');
        }
            $datas = $datas ->where('date_check', date('Y-m-d'))
                            ->orderBy('poly_id','ASC')
                            ->orderBy('no_antrian','ASC')
                            ->get();
        return view('admin.register.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $register = Register::with('polies','users')
                                ->where('date_check', date('Y-m-d'))
                                ->where('id', $id)
                                ->first();
        /*cek dokter*/
        $poliId = $register->poly_id;
        $day = format_hari(Carbon::now()->format('l'));
        $daftarDokters = Schedule::with('polies', 'users')
                                ->where('day', $day)
                                ->where('poly_id', $poliId)
                                ->get();
        return view('admin.register.edit', compact('register', 'daftarDokters'));
    }

    public function check($id)
    {
        /*prepare data*/
        $register = Register::with('polies','users','medicalRecords')
                                ->where('date_check', date('Y-m-d'))
                                ->where('id', $id)
                                ->first();
        $medicines = ListMedicine::with('medicines')
                                ->orderBy('medicine_id')
                                ->get();
        return view('admin.register.dokterCheck', compact('register', 'medicines'));
    }

    public function medicine($id)
    {
        /*prepare data*/
        $register = Register::with('polies','users','medicalRecords')
                                ->where('date_check', date('Y-m-d'))
                                ->where('id', $id)
                                ->first();
        $medicalRecord = $register->medicalRecords->first();
        $ids = $register->medicalRecords->first()->MedicalRecordsListMedicines;
        // dd($ids);
        // $medicineName = array();
        $medicineName = [];
        foreach ($ids as $isi) {
           $medicine_id = $isi['medicine_id'];
           $listMedicineId = $isi->pivot['list_medicine_id'];
           $medicine = Medicine::where('id', $medicine_id)
                               ->first();
           $listMedicine = ListMedicine::where('id', $listMedicineId)
                               ->first();
           $medicineName[] = ['name' => $medicine->name." (".$medicine->aturan_pakai.")",
                              'price' => $listMedicine->price];
           // $medicineName['price'][] = ;
        }
        // dd($medicineName);
        return view('admin.register.apotek', compact('register','medicalRecord','medicineName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateStatus(Request $request)
    {
        $id = $request->id;
        $message = $request->message;
        $register = Register::find($id);
        $register->update([
            'status_check' => $message,
        ]);
        return "berhasil";
    }

    public function updateDokter(Request $request)
    {
       $this->validate($request, [
           'doctor_diagnosis' => 'required',
       ]);
       $register_id       = $request->register_id;
       $message           = $request->status_check;
       $medical_record_id = $request->medical_record_id;
       $doctor_diagnosis  = $request->doctor_diagnosis;
       $register = Register::find($register_id);
       $register->update([
           'status_check' => $message
       ]);
       $medical_records = MedicalRecord::find($medical_record_id);
       $medical_records->update([
           'doctor_diagnosis' => $doctor_diagnosis
       ]);

       for ($i=0; $i < count($request->list_medicines); $i++) {
           $val[] = [
              'medical_record_id' => $medical_record_id,
              'list_medicine_id' => $request->list_medicines[$i]
           ];
       }
       MedicalRecordsListMedicine::insert($val);
       return redirect()->route('dokter.data-register.index')->with('success', 'Berhasil Memberikan Tindakan untuk Pasien');
    }

    public function record(Request $request)
    {
        $this->validate($request, [
            'doctor_id'       => 'required',
            'keterangan'      => 'required',
            'first_diagnosis' => 'required|min:15',
        ]);

        $registrasiId   = $request->register_id;
        $doctorId       = $request->doctor_id;
        $polyId         = $request->poly_id;
        $keterangan     = $request->keterangan;
        $firstDiagnosis = $request->first_diagnosis;
        $statusCheck    = $request->status_check;

        $register = Register::find($registrasiId);
        $register->update([
            'status_check' => $statusCheck,
        ]);

        $storeRecord = MedicalRecord::create([
            'register_id'     => $registrasiId,
            'doctor_id'       => $doctorId,
            'poly_id'         => $polyId,
            'first_diagnosis' => $firstDiagnosis,
            'keterangan'      => $keterangan,
            'created_at'      => Carbon::now(),
        ]);

        return redirect()->route('data-register.index')->with('success', 'Berhasil Melakukan Diagnosa Awal');
    }
}
