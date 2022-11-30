<?php

namespace App\Http\Controllers;

use App\Models\PerhitunganPayroll;
use Illuminate\Http\Request;

class PerhitunganPayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perhitungan_payroll = PerhitunganPayroll::wih([
            'produk', 'upah'
        ])->get();

        return view('pages.payroll.index', compact('perhitungan_payroll'));
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
            'tanggal_produksi' => 'required',
            'karyawan_id'      => 'required',
            'produk_id'        => 'required',
            'upah_id'          => 'required',
            'qty'              => 'required',
            'total'            => 'required',
        ]);

        PerhitunganPayroll::create([
            'tanggal_produksi' => $request->tanggal_produksi,
            'karyawan_id'      => $request->karyawan_id,
            'produk_id'        => $request->produk_id,
            'upah_id'          => $request->upah_id,
            'qty'              => $request->qty,
            'total'            => $request->total,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerhitunganPayroll  $perhitunganPayroll
     * @return \Illuminate\Http\Response
     */
    public function show(PerhitunganPayroll $perhitunganPayroll)
    {
        //
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
    public function destroy(PerhitunganPayroll $perhitunganPayroll)
    {
        $perhitunganPayroll->delete();
    }
}
