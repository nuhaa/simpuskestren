<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Register;
use App\Models\Schedule;
use App\Models\MedicalRecord;

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
                            ->orderBy('date_check','DESC')
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
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

        echo "berhasil";
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
