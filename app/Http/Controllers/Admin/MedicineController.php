<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Medicine;
use DB;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = Medicine::orderBy('name', 'asc')
                                ->paginate(10);
        return view('admin.medicine.index', [
          'medicines' => $medicines
        ]);
    }

    public function search(Request $request)
    {
        $name = $request->name;
        $kegunaan = $request->kegunaan;
        $medicines = DB::table('medicines')
            ->where('kegunaan', 'like', '%'.$kegunaan.'%')
            ->where('name', 'like', '%'.$name.'%')
            ->paginate(10);
        return view('admin.medicine.index', [
          'medicines' => $medicines
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.medicine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3',
            'aturan_pakai' => 'required|min:5',
            'sasaran' => 'required|min:4',
            'kegunaan' => 'required|min:15',
        ]);

        Medicine::create([
            'name' => ucwords($request->name),
            'aturan_pakai' => ucwords($request->aturan_pakai),
            'sasaran' => ucwords($request->sasaran),
            'kegunaan' => ucwords($request->kegunaan),
        ]);

        return redirect()->route('medicine.index')->with('success', 'Berhasil Mencambahkan Master Obat');
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
    public function edit(Medicine $medicine)
    {
        return view('admin.medicine.edit', compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'aturan_pakai' => 'required|min:5',
            'sasaran' => 'required|min:4',
            'kegunaan' => 'required|min:15',
        ]);

        $medicine->update([
          'name' => ucwords($request->name),
          'aturan_pakai' => ucwords($request->aturan_pakai),
          'sasaran' => ucwords($request->sasaran),
          'kegunaan' => ucwords($request->kegunaan),
        ]);

        $message = 'Berhasil Memperbaharui Obat '. $request->name;
        return redirect()->route('medicine.index')->with('success', $message);
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
