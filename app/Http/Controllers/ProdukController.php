<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('pages.produk.index', compact('produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_produk_id' => 'required',
            'nama_produk'        => 'required',
            'satuan'             => 'required',
            'warna'              => 'required',
            'berat_produk'       => 'required',
            'keterangan'         => 'required',
        ]);

        Produk::create([
            'kategori_produk_id' => $request->kategori_produk_id,
            'nama_produk'        => $request->nama_produk,
            'satuan'             => $request->satuan,
            'warna'              => $request->warna,
            'berat_produk'       => $request->berat_produk,
            'keterangan'         => $request->keterangan,
        ]);
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'kategori_produk_id' => 'required',
            'nama_produk'        => 'required',
            'satuan'             => 'required',
            'warna'              => 'required',
            'berat_produk'       => 'required',
            'keterangan'         => 'required',
        ]);

        $produk->update([
            'kategori_produk_id' => $request->kategori_produk_id,
            'nama_produk'        => $request->nama_produk,
            'satuan'             => $request->satuan,
            'warna'              => $request->warna,
            'berat_produk'       => $request->berat_produk,
            'keterangan'         => $request->keterangan,
        ]);
    }

    public function delete(Produk $produk)
    {
        $produk->delete();
    }
}
