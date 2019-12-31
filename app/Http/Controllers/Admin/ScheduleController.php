<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Poly;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::with('users','polies')->paginate(5);
        return view('admin.schedule.index',[
            'schedules' => $schedules,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $doctors = User::with('roles')->get();
        $doctors = User::with('roles')->get();
        $polies = Poly::orderBy('id')->get();
        return view('admin.schedule.create', compact('doctors', 'polies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'poly_id' => 'required',
            'day' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
        ]);

        $cekJadwal = Schedule::where('user_id', $request->user_id)
                              ->where('poly_id', $request->poly_id)
                              ->where('day', $request->day)
                              ->count();
        if ($cekJadwal > 0) {
            $message = 'Dokter Sudah Memiliki Jadwal Dihari '.$request->day;
            return redirect()->route('schedule.create')->with('danger', $message);
        }else{
            Schedule::create([
                'user_id' => $request->user_id,
                'poly_id' => $request->poly_id,
                'day' => $request->day,
                'time_start' => $request->time_start,
                'time_end' => $request->time_end,
            ]);
            return redirect()->route('schedule.index')->with('success', 'Berhasil Menambahkan Jadwal Dokter');
        }
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
        //
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
        //
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
}
