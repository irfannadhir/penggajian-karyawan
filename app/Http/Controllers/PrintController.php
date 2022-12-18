<?php

namespace App\Http\Controllers;

use App\Models\PerhitunganPayroll;
use App\Models\User;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function index()
    {
        $karyawans = User::where('role', 'karyawan borongan')->get();
        return view('pages.print-slip.index', compact('karyawans'));
    }

    public function print(Request $request)
    {
        $request->validate([
            'karyawan_id'   => 'required',
            'tanggal_awal'  => 'required',
            'tanggal_akhir' => 'required',
        ]);

        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;
        $payroll = PerhitunganPayroll::where('karyawan_id', $request->karyawan_id)
            ->with(['karyawan', 'detail.produk'])
            ->whereBetween('tanggal_produksi', [$tanggal_awal, $tanggal_akhir])->get();
        $admin_payroll = User::where('role', 'admin payroll')->first();

        return view('pages.print-slip.print', compact('payroll', 'admin_payroll'));
    }
}
