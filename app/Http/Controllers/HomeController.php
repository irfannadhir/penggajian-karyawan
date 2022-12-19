<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function setting()
    {
        return view('pages.setting');
    }

    public function update_setting(Request $request, User $karyawan)
    {
        $request->validate([
            'name'     => 'required',
            'password' => 'required',
            'alamat'   => 'required',
            'no_hp'    => 'required',
            'foto'     => 'required',
        ]);

        $foto = $request->foto ? $request->file('foto')->store('assets/produk', 'public') : $request->old;
        $data = [
            'name'     => $request->name,
            'alamat'   => $request->alamat,
            'no_hp'    => $request->no_hp,
            'foto'     => $foto,
        ];

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $karyawan->update($data);

        if ($request->foto && Storage::disk('public')->exists($karyawan->foto)) {
            unlink('storage/' . $karyawan->foto);
        }

        Alert::success('Congrats', 'Berhasil update pengaturan');
        return redirect('produk');
    }
}
