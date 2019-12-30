<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Position;
// use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->paginate(5);
        // dd($users);
        return view('admin.user.index', [
          'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('id')->get();
        $positions = Position::orderBy('id')->get();
        return view('admin.user.create', compact('roles', 'positions'));
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'address' => 'required',
            'jabatan' => 'required',
            'gender' => 'required',
            'status_pendaftaran' => 'required',
            'phone' => 'required',
            'role_id' => 'required',
        ]);

        $userInsert = User::create([
            'name' => ucwords($request->name),
            'nis' => $request->nis,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address' => ucfirst($request->address),
            'jabatan' => $request->jabatan,
            'gender' => $request->gender,
            'status_pendaftaran' => $request->status_pendaftaran,
            'phone' => $request->phone,
        ]);

        $roleId = $request->role_id;

        $userInsert->roles()->attach($roleId);

        return redirect()->route('user.index')->with('success', 'Berhasil Menambahkan Pengguna');
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
