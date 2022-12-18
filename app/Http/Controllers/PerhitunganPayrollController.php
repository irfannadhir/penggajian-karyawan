<?php

namespace App\Http\Controllers;

use App\Models\DetailPayroll;
use App\Models\User;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\PerhitunganPayroll;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PerhitunganPayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role !== 'admin payroll') {
            $perhitungan_payrolls = PerhitunganPayroll::selectRaw("karyawan_id, SUM(total) as total_gaji, MONTH(tanggal_produksi) month")
                ->with('karyawan')
                ->where('karyawan_id', auth()->user()->id)
                ->groupBy('karyawan_id', 'month')
                ->orderBy('month', 'desc')
                ->get();
        } else {
            $perhitungan_payrolls = PerhitunganPayroll::selectRaw("karyawan_id, SUM(total) as total_gaji, MONTH(tanggal_produksi) month")
                ->with('karyawan')
                ->groupBy('karyawan_id', 'month')
                ->orderBy('month', 'desc')
                ->get();
        }

        return view('pages.payroll.index', compact('perhitungan_payrolls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawans = User::where('role', 'karyawan borongan')->get();
        $produks = Produk::all();
        return view('pages.payroll.create', compact('karyawans', 'produks'));
    }

    public function detail_payroll(PerhitunganPayroll $payroll)
    {
        $payroll->load(['detail.produk']);
        return view('pages.payroll.detail_payroll', compact('payroll'));
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
            'tanggal_produksi' => 'required',
            'karyawan_id'      => 'required',
            'produk_id'        => 'required|array',
            'qty'              => 'required|array',
        ]);

        $produks = $request->produk_id;
        $qty = $request->qty;

        if (count(array_unique($produks)) < count($produks)) {
            Alert::error('Failed', 'Anda memasukkan data produk yang sama');
            return redirect('payroll/create');
        }

        $cek_validasi = PerhitunganPayroll::where([
            'tanggal_produksi' => $request->tanggal_produksi,
            'karyawan_id'      => $request->karyawan_id,
        ])->first();

        if ($cek_validasi) {
            Alert::error('Failed', 'Data di tanggal ini sudah ada!');
            return redirect('payroll/create');
        }

        try {
            DB::beginTransaction();
            $payroll = PerhitunganPayroll::create([
                'tanggal_produksi' => $request->tanggal_produksi,
                'karyawan_id'      => $request->karyawan_id,
                'total'            => 0,
            ]);

            $data = [];
            $total = 0;
            foreach ($produks as $key => $value) {
                $detail_produk = [
                    'payrol_id' => $payroll->id,
                    'produk_id' => $value,
                    'qty'       => $qty[$key],
                ];
                array_push($data, $detail_produk);

                $produk = Produk::find($value);
                $total += $produk->upah_per_produk * $qty[$key];
            }

            DetailPayroll::insert($data);

            $payroll->update(['total' => $total]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Alert::error('Failed', 'Gagal simpan payroll');
            return redirect('payroll/create');
        }

        Alert::success('Success', 'Berhasil input payroll');
        return redirect('payroll');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerhitunganPayroll  $perhitunganPayroll
     * @return \Illuminate\Http\Response
     */
    public function show($payroll)
    {
        if (auth()->user()->role !== 'admin payroll' && $payroll != auth()->user()->id) {
            // abort(403);
            return redirect()->back();
        }
        $detail_payroll = PerhitunganPayroll::where('karyawan_id', $payroll)->orderBy('tanggal_produksi', 'desc')->get();
        return view('pages.payroll.detail', compact('detail_payroll'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerhitunganPayroll  $perhitunganPayroll
     * @return \Illuminate\Http\Response
     */
    public function edit(PerhitunganPayroll $perhitunganPayroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PerhitunganPayroll  $perhitunganPayroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PerhitunganPayroll $perhitunganPayroll)
    {
        $request->validate([
            'tanggal_produksi' => 'required',
            'karyawan_id'      => 'required',
            'produk_id'        => 'required',
            'upah_id'          => 'required',
            'qty'              => 'required',
            'total'            => 'required',
        ]);

        $perhitunganPayroll->update([
            'tanggal_produksi' => $request->tanggal_produksi,
            'karyawan_id'      => $request->karyawan_id,
            'produk_id'        => $request->produk_id,
            'upah_id'          => $request->upah_id,
            'qty'              => $request->qty,
            'total'            => $request->total,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerhitunganPayroll  $perhitunganPayroll
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerhitunganPayroll $payroll)
    {
        $payroll->delete();

        Alert::success('Success', 'Berhasil hapus payroll');
        return redirect('payroll');
    }
}
