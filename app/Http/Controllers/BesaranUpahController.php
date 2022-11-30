<?php

namespace App\Http\Controllers;

use App\Models\BesaranUpah;
use Illuminate\Http\Request;

class BesaranUpahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $besaran_upah = BesaranUpah::with('produk')->get();
        return view('pages.upah.index', compact('besaran_upah'));
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
            'produk_id'    => 'required',
            'besaran_upah' => 'required',
            'keterangan'   => 'required',
        ]);

        BesaranUpah::create([
            'produk_id'    => $request->produk_id,
            'besaran_upah' => $request->besaran_upah,
            'keterangan'   => $request->keterangan,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BesaranUpah  $besaranUpah
     * @return \Illuminate\Http\Response
     */
    public function show(BesaranUpah $besaranUpah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BesaranUpah  $besaranUpah
     * @return \Illuminate\Http\Response
     */
    public function edit(BesaranUpah $besaranUpah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BesaranUpah  $besaranUpah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BesaranUpah $besaranUpah)
    {
        $request->validate([
            'produk_id'    => 'required',
            'besaran_upah' => 'required',
            'keterangan'   => 'required',
        ]);

        $besaranUpah->update([
            'produk_id'    => $request->produk_id,
            'besaran_upah' => $request->besaran_upah,
            'keterangan'   => $request->keterangan,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BesaranUpah  $besaranUpah
     * @return \Illuminate\Http\Response
     */
    public function destroy(BesaranUpah $besaranUpah)
    {
        $besaranUpah->delete();
    }
}
