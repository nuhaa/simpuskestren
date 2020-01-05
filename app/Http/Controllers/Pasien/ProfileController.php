<?php

namespace App\Http\Controllers\Pasien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Alert;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pasien.profile');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'nis' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'phone' => 'required',
            'alamat' => 'required',
        ]);
        $id     = $request->id;

        User::where($id)->update([
          'name'   => $request->name,
          'nis'    => $request->nis,
          'email'  => $request->email,
          'gender' => $request->gender,
          'phone'  => $request->phone,
          'address' => $request->alamat,
        ]);
        // try {
        //     Alert::success('Berhasil Memperbaharui Data Profile', 'Sukses');
        //     return redirect()->route('pasien.profile');
        // } catch (\Illuminate\Database\QueryException $ex) {
        //     Alert::error('Gagaal', 'Gagal');
        //     return redirect()->route('pasien.profile');
        // }
    }
}
