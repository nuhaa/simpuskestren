<?php

namespace App\Http\Controllers\Admin;

use DB;
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
        $users = User::with('roles')->paginate(10);
        $roles = Role::orderBy('id','asc')->get();
        return view('admin.user.index', [
          'users' => $users,
          'roles' => $roles,
        ]);
    }

    public function search(Request $request)
    {
        $idRole = $request->role;
        $name = ucwords($request->name);
        $users = DB::table('users')
            ->join('users_roles', 'users.id', '=', 'users_roles.user_id')
            ->join('roles', 'roles.id', '=', 'users_roles.role_id')
            ->select('users.*', 'roles.name as roleName', 'roles.id as roleId')
            ->where('users.name', 'like', '%'.$name.'%')
            ->where('roles.id', function($query) use ($request){
                if (isset($request->role)) {
                    $query->select('roles.id as roleId')
                          ->where('roles.id', $request->role);
                }else{
                    $query->select('roles.id as roleId');
                }
            })
            ->paginate(10);
        // dd($users);
        $roles = Role::orderBy('id','asc')->get();
        return view('admin.user.cari', [
          'users' => $users,
          'roles' => $roles,
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
