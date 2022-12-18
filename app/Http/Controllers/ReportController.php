<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PerhitunganPayroll;

class ReportController extends Controller
{
    public function index()
    {
        return view('pages.laporan.index');
    }


    public function print(Request $request)
    {
        $request->validate([
            'tanggal_awal'  => 'required',
            'tanggal_akhir' => 'required',
        ]);

        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;
        $payroll = PerhitunganPayroll::with(['karyawan', 'detail.produk'])
            ->whereBetween('tanggal_produksi', [$tanggal_awal, $tanggal_akhir])
            ->orderBy('tanggal_produksi', 'desc')
            ->get();

        $admin_payroll = User::where('role', 'admin payroll')->first();


        return view('pages.laporan.print', compact('payroll', 'tanggal_awal', 'tanggal_akhir', 'admin_payroll'));
    }
}
