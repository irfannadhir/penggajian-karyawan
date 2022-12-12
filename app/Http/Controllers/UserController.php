<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('pages.users.index', compact('users'));
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
        $request->validate([
            'name'            => 'required',
            'tgl_masuk_kerja' => 'required|date',
            'jenis_kelamin'   => 'required',
            'tempat_lahir'    => 'required',
            'tanggal_lahir'   => 'required|date',
            'alamat'          => 'required',
            'no_hp'           => 'required|max:20',
            'foto'            => 'mimes:jpeg,jpg,png,gif|required',
            'role'            => 'required',
            'email'           => 'required|unique:users',
            'nik'             => 'required|unique:users',
            'password'        => 'required',
        ]);

        $foto = $request->foto ? $request->file('foto')->store('assets/foto_karyawan', 'public') : '';

        User::create([
            'name'            => $request->name,
            'tgl_masuk_kerja' => $request->tgl_masuk_kerja,
            'jenis_kelamin'   => $request->jenis_kelamin,
            'tempat_lahir'    => $request->tempat_lahir,
            'tanggal_lahir'   => $request->tanggal_lahir,
            'alamat'          => $request->alamat,
            'no_hp'           => $request->no_hp,
            'foto'            => $foto,
            'role'            => $request->role,
            'email'           => $request->email,
            'nik'             => $request->nik,
            'password'        => bcrypt($request->password),
        ]);

        Alert::success('Congrats', 'Berhasil menambahkan user');
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'            => 'required',
            'tgl_masuk_kerja' => 'required|date',
            'jenis_kelamin'   => 'required',
            'tempat_lahir'    => 'required',
            'tanggal_lahir'   => 'required|date',
            'alamat'          => 'required',
            'no_hp'           => 'required',
            'foto'            => 'mimes:jpeg,jpg,png,gif',
            'role'            => 'required',
            'email'           => 'required',
            'nik'             => 'required',
        ]);

        $foto = $request->foto ? $request->file('foto')->store('assets/produk', 'public') : $request->old;

        $data = [
            'name'            => $request->name,
            'tgl_masuk_kerja' => $request->tgl_masuk_kerja,
            'jenis_kelamin'   => $request->jenis_kelamin,
            'tempat_lahir'    => $request->tempat_lahir,
            'tanggal_lahir'   => $request->tanggal_lahir,
            'alamat'          => $request->alamat,
            'no_hp'           => $request->no_hp,
            'foto'            => $foto,
            'role'            => $request->role,
            'email'           => $request->email,
        ];

        $data['password'] =  $request->password ? bcrypt($request->password) : '';

        $user->update($data);

        if ($request->foto && Storage::disk('public')->exists($user->foto)) {
            unlink('storage/' . $user->foto);
        }

        Alert::success('Congrats', 'Berhasil mengubah user');
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        if ($user->foto && Storage::disk('public')->exists($user->foto)) {
            unlink('storage/' . $user->foto);
        }
        Alert::success('Congrats', 'Berhasil menghapus user');
        return redirect('user');
    }
}
