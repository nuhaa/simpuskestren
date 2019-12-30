<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Position;
use Yajra\Datatables\Datatables;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::orderBy('name', 'asc')->paginate(5);
        return view('admin.position.index', [
          'positions' => $positions
        ]);
    }

    /* data position */
    public function position()
    {
        $positions = Position::orderBy('name', 'asc');
        return Datatables::of($positions)->addColumn('action', function($positions){
            return '<a href="position/'.$positions->id.'/edit" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>';
        })->rawColumns(['action'])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.position.create');
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
            'name' => 'required|min:3'
        ]);

        Position::create([
            'name' => ucwords($request->name),
        ]);

        return redirect()->route('position.index')->with('success', 'Berhasil Menambahkan Master Jabatan');
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
    public function edit(Position $position)
    {
        return view('admin.position.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        $this->validate($request,[
            'name' => 'required|min:3',
        ]);

        $position->update([
            'name' => ucwords($request->name)
        ]);

        return redirect()->route('position.index')->with('success', 'Berhasil Memperbaharui Master Jabatan');
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
