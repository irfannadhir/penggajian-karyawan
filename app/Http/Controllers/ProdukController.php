<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::with('kategori')->get();
        $kategori = KategoriProduk::all();
        return view('pages.produk.index', compact('produks', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_produk_id' => 'required',
            'nama_produk'        => 'required',
            'satuan'             => 'required',
            'warna'              => 'required',
            'berat_produk'       => 'required',
            'satuan_produk'      => 'required',
            'upah_per_produk'    => 'required',
            'keterangan'         => 'required',
        ]);

        Produk::create([
            'kategori_produk_id' => $request->kategori_produk_id,
            'nama_produk'        => $request->nama_produk,
            'satuan'             => $request->satuan,
            'warna'              => $request->warna,
            'berat_produk'       => $request->berat_produk,
            'satuan_produk'      => $request->satuan_produk,
            'upah_per_produk'    => $request->upah_per_produk,
            'keterangan'         => $request->keterangan,
        ]);

        Alert::success('Congrats', 'Berhasil menyimpan produk');
        return redirect('produk');
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'kategori_produk_id' => 'required',
            'nama_produk'        => 'required',
            'satuan'             => 'required',
            'warna'              => 'required',
            'berat_produk'       => 'required',
            'satuan_produk'      => 'required',
            'upah_per_produk'    => 'required',
            'keterangan'         => 'required',
        ]);

        $produk->update([
            'kategori_produk_id' => $request->kategori_produk_id,
            'nama_produk'        => $request->nama_produk,
            'satuan'             => $request->satuan,
            'warna'              => $request->warna,
            'berat_produk'       => $request->berat_produk,
            'satuan_produk'      => $request->satuan_produk,
            'upah_per_produk'    => $request->upah_per_produk,
            'keterangan'         => $request->keterangan,
        ]);

        Alert::success('Congrats', 'Berhasil mengubah produk');
        return redirect('produk');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        Alert::success('Congrats', 'Berhasil menghapus produk');
        return redirect('produk');
    }
}
