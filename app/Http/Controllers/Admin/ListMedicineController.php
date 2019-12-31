<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ListMedicine;
use App\Models\Medicine;

class ListMedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $listMedicines = ListMedicine::with('medicines')->paginate(5);
        // $listMedicines = ListMedicine::with('medicines')->orderBy('id', 'DESC')->toSql();
        $listMedicines = ListMedicine::with('medicines')->orderBy('id', 'DESC')->paginate(5);
        return view('admin.listMedicine.index',[
          'listMedicines' => $listMedicines,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicines = Medicine::orderBy('id')->get();
        return view('admin.listMedicine.create', compact('medicines'));
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
            'medicine_id' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'information' => 'required',
            'date_buy' => 'required|date',
            'date_expired' => 'required|date',
        ]);

        ListMedicine::create([
            'medicine_id' => $request->medicine_id,
            'stock' => $request->stock,
            'price' => $request->price,
            'information' => $request->information,
            'date_buy' => $request->date_buy,
            'date_expired' => $request->date_expired,
            'status' => 'available',
        ]);

        return redirect()->route('listmedicine.index')->with('success', 'Berhasil Menambahkan Obat');
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
    public function edit(ListMedicine $listMedicines)
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
    public function update(Request $request, ListMedicine $listMedicines)
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
